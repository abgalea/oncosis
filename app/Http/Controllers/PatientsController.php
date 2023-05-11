<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use Event;
use DateTime;
use Validator;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Requests\PatientRequest;

use App\Models\Metric;
use App\Models\Patient;
use App\Models\Practice;
use App\Models\Provider;
use App\Models\Pathology;
use App\Models\Treatment;
use App\Models\PatientTest;
use App\Models\PatientPhysical;
use App\Models\PatientTreatment;
use App\Models\TreatmentLog;
use App\Models\InsuranceProvider;
use App\Models\PathologyLocation;
use App\Models\PatientConsultation;
use App\Models\PaymentLog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Events\NewPhysicals;

class PatientsController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Pacientes';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'patients',
        'index' => 'patients.index',
        'store' => 'patients.store',
        'create' => 'patients.create',
        'show' => 'patients.show',
        'destroy' => 'patients.destroy',
        'update' => 'patients.update',
        'edit' => 'patients.edit'
    ];

    /**
     * View parameters
     * @var array
     */
    private $params = [];

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->params = [
            'routes' => $this->routes,
            'breadcrumbs' => [
                ['route' => 'home', 'title' => 'Inicio'],
                ['route' => $this->routes['index'], 'title' => $this->resourceTitle]
            ],
            'title' => $this->resourceTitle,
            'items_per_page' => 15
        ];

        // dd( $this->id );

        $this->params['selectors']['providers'] = Provider::active()->orderBy('name')->lists('name', 'id');
        $this->params['selectors']['pathologies'] = Pathology::active()->orderBy('name')->lists('name', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->params['filter_patient_id'] = $request->input('filter_patient_id');
        $this->params['filter_firstname'] = $request->input('filter_firstname');
        $this->params['filter_lastname'] = $request->input('filter_lastname');
        $this->params['filter_insurance'] = $request->input('filter_insurance');
        $this->params['filter_pathology'] = $request->input('filter_pathology');

        $this->params['items'] = Patient::select(['patients.*'])
                                        ->orderBy('last_name')
                                        ->orderBy('first_name')
                                        ->filteredPaginate([$this->params['filter_patient_id'], $this->params['filter_firstname'], $this->params['filter_lastname'], $this->params['filter_insurance'], $this->params['filter_pathology'] ], $this->params['items_per_page']);

        // $items = $this->params['items']->toArray();
        // dd( $items );

        $this->params['selectors']['pathologies'] = $this->params['selectors']['pathologies']->prepend('','');
        $this->params['insurance_providers'] = InsuranceProvider::orderBy('name')->lists('name', 'id')->prepend('', '');

        return view($this->routes['index'], $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->params['title'] = 'Nuevo Paciente';

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['create'],
                'title' => $this->params['title']
            ]
        );

        $this->params['action_route'] = $this->routes['store'];

        $this->params['selected_insurance_providers'] = [];

        $this->params['insurance_providers'] = InsuranceProvider::orderBy('name')->lists('name', 'id');

        $this->params['sex_values'] = Patient::$sexValues;

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientRequest $request
     * @return mixed
     */
    public function store(PatientRequest $request)
    {
        try
        {
            $data = $request->all();

            if (isset($data['date_of_birth']) AND trim($data['date_of_birth']) != '')
            {
                $data['date_of_birth'] = DateTime::createFromFormat('d/m/Y', $data['date_of_birth'])->format('Y-m-d');
            }
            $item = Patient::create($data);

            $item->insurance_providers()->sync($data['insurance_provider_id']);
        }
        catch (QueryException $e)
        {
            return redirect($this->routes['create'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo crear el Paciente.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Nuevo Paciente creada exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Patient::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        $this->params['migracion_seguimiento'] = null;
        if (trim($item->c_cod) != '')
        {
            // $this->params['migracion_seguimiento'] = DB::connection('pgsql')->select('SELECT c_causa FROM seguimiento WHERE c_cod = ' . $item->c_cod);
        }

        // Patient Tests -
        $tests = DB::table('patient_tests')
            ->where('patient_id', $id)
            ->leftJoin('users', 'patient_tests.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'estudio' AS item_tipo"))
            ->addSelect(DB::raw("patient_tests.id AS item_id"))
            ->addSelect(DB::raw("patient_tests.estudio_detalle AS item_titulo"))
            ->addSelect(DB::raw('patient_tests.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_tests.estudio_laboratorio AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Treatments - Tratamientos Activos
        $tratamientos = DB::table('patient_treatments')
            ->where('patient_id', $id)
            ->where('estado', 'activo')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'tratamiento' AS item_tipo"))
            ->addSelect(DB::raw("patient_treatments.id AS item_id"))
            ->addSelect(DB::raw("patient_treatments.tratamiento AS item_titulo"))
            ->addSelect(DB::raw('patient_treatments.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_treatments.observaciones AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Treatments - Tratamientos Cancelados
        $tratamientos_cancelados = DB::table('patient_treatments')
            ->where('patient_id', $id)
            ->where('estado', 'cancelado')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'tratamiento_cancelado' AS item_tipo"))
            ->addSelect(DB::raw("patient_treatments.id AS item_id"))
            ->addSelect(DB::raw("patient_treatments.tratamiento AS item_titulo"))
            ->addSelect(DB::raw('patient_treatments.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_treatments.observaciones AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Treatments - Tratamientos Cerrados
        $tratamientos_cerrados = DB::table('patient_treatments')
            ->where('patient_id', $id)
            ->where('estado', 'cerrado')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'tratamiento_cerrado' AS item_tipo"))
            ->addSelect(DB::raw("patient_treatments.id AS item_id"))
            ->addSelect(DB::raw("patient_treatments.tratamiento AS item_titulo"))
            ->addSelect(DB::raw('patient_treatments.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_treatments.observaciones AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Locations
        $localizaciones = DB::table('pathology_locations')
            ->leftJoin('pathologies', 'pathology_locations.pathology_id', '=', 'pathologies.id')
            ->where('patient_id', $id)
            ->leftJoin('users', 'pathology_locations.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'localizacion' AS item_tipo"))
            ->addSelect(DB::raw("pathology_locations.id AS item_id"))
            ->addSelect(DB::raw("CONCAT(pathologies.name, ' - ', pathology_locations.tipo) AS item_titulo"))
            ->addSelect(DB::raw('pathology_locations.created_at AS item_fecha'))
            ->addSelect(DB::raw("'' AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Consultations
        $consultas = DB::table('patient_consultations')
            ->where('patient_id', $id)
            ->leftJoin('users', 'patient_consultations.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'consulta' AS item_tipo"))
            ->addSelect(DB::raw("patient_consultations.id AS item_id"))
            ->addSelect(DB::raw("patient_consultations.consulta_tipo AS item_titulo"))
            ->addSelect(DB::raw('patient_consultations.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_consultations.consulta_resumen AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Deceased
        $fallecimientos = DB::table('patients')
            ->where('id', $id)
            ->where('is_dead', true)
            ->addSelect(DB::raw("'fallecido' AS item_tipo"))
            ->addSelect(DB::raw("patients.id AS item_id"))
            ->addSelect(DB::raw("'Paciente Fallecido' AS item_titulo"))
            ->addSelect(DB::raw('patients.updated_at AS item_fecha'))
            ->addSelect(DB::raw("patients.causa_de_muerte AS item_notas"))
            ->addSelect(DB::raw("'' as updated"));

        // Treatment Log
        $historico_tratamiento = DB::table('treatment_logs')
            ->where('patient_treatments.patient_id', $id)
            ->leftJoin('patient_treatments', 'treatment_logs.patient_treatment_id', '=', 'patient_treatments.id')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'tratamiento_historico' AS item_tipo"))
            ->addSelect(DB::raw("treatment_logs.id AS item_id"))
            ->addSelect(DB::raw("'Histórico Tratamiento' AS item_titulo"))
            ->addSelect(DB::raw('treatment_logs.created_at AS item_fecha'))
            ->addSelect(DB::raw("CONCAT('Ciclo: ', ciclo, '\nToxicidad: ', toxicidad, '\nTensión Arterial: ', tension_arterial, '\nFrec. Cardíaca: ', frecuencia_cardiaca, '\nPeso: ', peso, '\nObservaciones: ', treatment_logs.observaciones) AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Physicals
        $metrics = DB::table('patient_physicals')
            ->where('patient_id', $id)
            ->leftJoin('users', 'patient_physicals.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'metrica' AS item_tipo"))
            ->addSelect(DB::raw("patient_physicals.id AS item_id"))
            ->addSelect(DB::raw("'Físico' AS item_titulo"))
            ->addSelect(DB::raw('patient_physicals.created_at AS item_fecha'))
            ->addSelect(DB::raw("CONCAT('Peso: ', fisico_peso, '\nAltura: ', fisico_altura, '\nSup. Corporal: ', ROUND(fisico_superficie_corporal, 2)) AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"))
            ->union($tests)
            ->union($tratamientos)
            ->union($tratamientos_cancelados)
            ->union($tratamientos_cerrados)
            ->union($localizaciones)
            ->union($consultas)
            ->union($fallecimientos)
            ->union($historico_tratamiento)
            ->orderBy('item_fecha', 'desc')
            ->get();

        $this->params['history'] = $metrics;

        // Últimas métricas
        // $patient_metrics = $patient_metric_data = [];
        // $metricas = Metric::active()->get();
        // foreach($metricas as $metric)
        // {
        //     $patientMetric = $item->metrics()->latest()->where('metric_id', $metric->id)->first();
        //     if ($patientMetric)
        //     {
        //         $patient_metrics[] = [
        //             'metric_id' => $metric->id,
        //             'metric_name' => $metric->name,
        //             'metric_value' => $patientMetric->metric_value
        //         ];
        //         $patient_metric_data[$metric->id] = $item->metrics()->latest()->where('metric_id', $metric->id)->lists('metric_value')->toArray();
        //     }
        // }

        // $this->params['patient_metrics'] = $patient_metrics;
        // $this->params['patient_metric_data'] = $patient_metric_data;

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.show';

        return view($this->routes['show'], $this->params);
    }

    public function historyPdf(Request $request){

        // dd( $request->all() );
        $inputs = $request->all();
        $id = $request->get('id');

        $item = Patient::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        $this->params['migracion_seguimiento'] = null;
        if (trim($item->c_cod) != '')
        {
            // $this->params['migracion_seguimiento'] = DB::connection('pgsql')->select('SELECT c_causa FROM seguimiento WHERE c_cod = ' . $item->c_cod);
        }

        $item->history = collect([]);

        if( isset($inputs['options']) && in_array('background', $inputs['options']) )
        {
            $item->history->push([
                'name' => 'antecedentes',
            ]);
        }

        // Patient Tests -
        $tests = DB::table('patient_tests')
            ->where('patient_id', $id)
            ->leftJoin('users', 'patient_tests.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'estudio' AS item_tipo"))
            ->addSelect(DB::raw("patient_tests.estudio_detalle AS item_titulo"))
            ->addSelect(DB::raw('patient_tests.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_tests.estudio_laboratorio AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"))
            ->orderBy('patient_tests.created_at', 'DESC')
            ->get();

        if( isset($inputs['options']) && in_array('studies', $inputs['options']) && !empty($tests) )
        {
            $item->history->push([
                'name' => 'estudio',
                'items' => $tests,
            ]);
        }


        // Patient Treatments - Tratamientos Activos
        $tratamientos = DB::table('patient_treatments')
            ->where('patient_id', $id)
            ->where('estado', 'activo')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'activo' AS item_tipo"))
            ->addSelect(DB::raw("patient_treatments.tratamiento AS item_titulo"))
            ->addSelect(DB::raw('patient_treatments.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_treatments.observaciones AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Treatments - Tratamientos Cancelados
        $tratamientos_cancelados = DB::table('patient_treatments')
            ->where('patient_id', $id)
            ->where('estado', 'cancelado')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'cancelado' AS item_tipo"))
            ->addSelect(DB::raw("patient_treatments.tratamiento AS item_titulo"))
            ->addSelect(DB::raw('patient_treatments.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_treatments.observaciones AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"));

        // Patient Treatments - Tratamientos Cerrados
        $tratamientos_cerrados = DB::table('patient_treatments')
            ->where('patient_id', $id)
            ->where('estado', 'cerrado')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'cerrado' AS item_tipo"))
            ->addSelect(DB::raw("patient_treatments.tratamiento AS item_titulo"))
            ->addSelect(DB::raw('patient_treatments.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_treatments.observaciones AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"))
            ->orderBy('patient_treatments.created_at', 'DESC')
            ->union($tratamientos)
            ->union($tratamientos_cancelados)
            ->get();

        if( isset($inputs['options']) && in_array('treatment', $inputs['options']) && !empty($tratamientos_cerrados) )
        {
            $item->history->push([
                'name' => 'tratamiento',
                'items' => $tratamientos_cerrados,
            ]);
        }

        // Patient Locations
        $localizaciones = DB::table('pathology_locations')
            ->leftJoin('pathologies', 'pathology_locations.pathology_id', '=', 'pathologies.id')
            ->where('patient_id', $id)
            ->leftJoin('users', 'pathology_locations.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'localizacion' AS item_tipo"))
            ->addSelect(DB::raw("CONCAT(pathologies.name, ' - ', pathology_locations.tipo) AS item_titulo"))
            ->addSelect(DB::raw('pathology_locations.created_at AS item_fecha'))
            ->addSelect(DB::raw("'' AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"))
            ->orderBy('pathology_locations.created_at', 'DESC')
            ->get();

        if( isset($inputs['options']) && in_array('location', $inputs['options']) && !empty($localizaciones) )
        {
            $item->history->push([
                'name' => 'localizacion',
                'items' => $localizaciones,
            ]);
        }

        // Patient Consultations
        $consultas = DB::table('patient_consultations')
            ->where('patient_id', $id)
            ->leftJoin('users', 'patient_consultations.updated_by', '=', 'users.id')
            ->leftJoin('treatments', 'patient_consultations.treatment_id', '=', 'treatments.id')
            ->addSelect(DB::raw("'consulta' AS item_tipo"))
            ->addSelect(DB::raw("treatments.description AS item_titulo"))
            ->addSelect(DB::raw('patient_consultations.created_at AS item_fecha'))
            ->addSelect(DB::raw("patient_consultations.consulta_resumen AS item_notas"))
            ->addSelect(['consulta_tipo', 'consulta_peso', 'consulta_altura', 'consulta_superficie_corporal', 'consulta_presion_arterial'])
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"))
            ->orderBy('patient_consultations.created_at', 'DESC')
            ->get();

        if( isset($inputs['options']) && in_array('consultation', $inputs['options']) && !empty($consultas) )
        {
            $item->history->push([
                'name' => 'consultas',
                'items' => $consultas,
            ]);
        }

        // Patient Deceased
        $fallecimientos = DB::table('patients')
            ->where('id', $id)
            ->where('is_dead', true)
            ->addSelect(DB::raw("'fallecido' AS item_tipo"))
            ->addSelect(DB::raw("'Paciente Fallecido' AS item_titulo"))
            ->addSelect(DB::raw('patients.updated_at AS item_fecha'))
            ->addSelect(DB::raw("patients.causa_de_muerte AS item_notas"))
            ->addSelect(DB::raw("'' as updated"))
            ->get();

        if( !empty($fallecimientos) )
        {
            $item->history->push([
                'name' => 'fallecido',
                'items' => $fallecimientos,
            ]);
        }

        // Treatment Log
        $historico_tratamiento = DB::table('treatment_logs')
            ->where('patient_treatments.patient_id', $id)
            ->leftJoin('patient_treatments', 'treatment_logs.patient_treatment_id', '=', 'patient_treatments.id')
            ->leftJoin('users', 'patient_treatments.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'tratamiento_historico' AS item_tipo"))
            ->addSelect(DB::raw("'Histórico Tratamiento' AS item_titulo"))
            ->addSelect(DB::raw('treatment_logs.created_at AS item_fecha'))
            ->addSelect(DB::raw("CONCAT('Ciclo: ', ciclo, '\nToxicidad: ', toxicidad, '\nTensión Arterial: ', tension_arterial, '\nFrec. Cardíaca: ', frecuencia_cardiaca, '\nPeso: ', peso, '\nObservaciones: ', treatment_logs.observaciones) AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"))
            ->orderBy('treatment_logs.created_at', 'DESC')
            ->get();

        if( isset($inputs['options']) && in_array('treatment', $inputs['options']) && !empty($historico_tratamiento) )
        {
            $item->history->push([
                'name' => 'tratamiento_historico',
                'items' => $historico_tratamiento,
            ]);
        }

        // Patient Physicals
        $metrics = DB::table('patient_physicals')
            ->where('patient_id', $id)
            ->leftJoin('users', 'patient_physicals.updated_by', '=', 'users.id')
            ->addSelect(DB::raw("'metrica' AS item_tipo"))
            ->addSelect(DB::raw("'Físico' AS item_titulo"))
            ->addSelect(DB::raw('patient_physicals.created_at AS item_fecha'))
            ->addSelect(DB::raw("CONCAT('Peso: ', fisico_peso, '\nAltura: ', fisico_altura, '\nSup. Corporal: ', ROUND(fisico_superficie_corporal, 2)) AS item_notas"))
            ->addSelect(DB::raw("CONCAT(users.first_name, ' ', users.last_name) as updated"))
            ->orderBy('item_fecha', 'desc')
            ->get();

        if( isset($inputs['options']) && in_array('physical', $inputs['options']) && !empty($metrics) )
        {
            $item->history->push([
                'name' => 'metrica',
                'items' => $metrics,
            ]);
        }

        $item->history = $item->history->keyBy('name');

        $pdfData = [
            'titulo' => 'Historial: ' . $item->first_name . ' ' . $item->last_name,
            'user' => Auth::user(),
            'nombres' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ];

        // dd($item->history['consultas'] );
        $pdf = PDF::loadView('patients.history-pdf', compact('item'));
        $pdf->setPaper('Legal');
        $pdf->setOrientation('portrait');
        $pdf->setOption('header-html', \View::make('pdf.header', compact('pdfData')));
        $pdf->setOption('footer-html', \View::make('pdf.footer', compact('pdfData')));
        $pdf->setOption('header-spacing', 2);
        return $pdf->stream();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->params['item'] = $item = Patient::with('insurance_providers')->findOrFail($id);

        $this->params['title'] = 'Editar ' . $item->short_code;

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['edit'],
                'route_params' => ['id' => $item->id],
                'title' => $this->params['title']
            ]
        );

        $this->params['action_route'] = $this->routes['update'];

        $this->params['selected_insurance_providers'] = $item->insurance_providers->lists('id')->toArray();

        $this->params['insurance_providers'] = InsuranceProvider::orderBy('name')->lists('name', 'id');

        $this->params['sex_values'] = Patient::$sexValues;

        return view($this->routes['base'] . '.form', $this->params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PatientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {
        $item = Patient::findOrFail($id);

        try
        {

            $data = $request->all();
            if (isset($data['date_of_birth']) AND trim($data['date_of_birth']) != '')
            {
                $data['date_of_birth'] = DateTime::createFromFormat('d/m/Y', $data['date_of_birth'])->format('Y-m-d');
            }
            $item->update($data);

            $item->insurance_providers()->sync($data['insurance_provider_id']);
        }
        catch (QueryException $e)
        {
            return redirect()
                    ->route($this->routes['edit'], [$item->id])
                    ->withMessages(['type' => 'error', 'text' => 'No se pudo editar el Paciente.']);
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Paciente editado exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Patient::findOrFail($id);

        try
        {
            $row->deleted_by = \Auth::user()->id;
            $row->save();
            $row->delete();
        }
        catch (QueryException $e)
        {
            return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'error', 'text' => 'No se pudo borrar el Paciente.']);
        }
        return redirect()
                ->route($this->routes['index'])
                ->withMessages(['type' => 'success', 'text' => 'El Paciente se ha borrado exitosamente.']);
    }

    public function checkinSave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $metrics = $request->get('metric');
        if (is_array($metrics))
        {
            foreach($metrics as $metric_id => $value)
            {
                $item->metrics()->create([
                    'metric_id' => $metric_id,
                    'metric_value' => $value
                    ]);
            }
        }

        return redirect()->route($this->routes['show'], ['id' => $item->id])
                ->withMessages(['type' => 'success', 'text' => 'Seguimiento registrado exitosamente.']);
    }

    public function background($id)
    {
        $item = Patient::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => 'patients.background.show',
                'route_params' => ['id' => $item->id],
                'title' => 'Antecedentes'
            ]
        );

        $this->params['item'] = $item;

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.background';

        return view('patients.background', $this->params);
    }

    public function backgroundSave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        // dd( $request->all() );
        $item->update($request->only(['antecedente_cantidad_tabaco', 'antecedente_tiempo_tabaco', 'antecedente_fumador_pasivo', 'antecedente_cantidad_alcohol', 'antecedente_tiempo_alcohol', 'antecedente_drogas', 'antecedente_menarca', 'antecedente_menospau', 'antecedente_aborto', 'antecedente_embarazo', 'antecedente_parto', 'antecedente_lactancia', 'antecedente_anticonceptivos', 'antecedente_anticonceptivos_aplicacion', 'antecedente_quirurgicos', 'antecedente_familiar_oncologico']));

        return redirect()->route('patients.background.show', [$item->id]);
    }

    public function pathology($id)
    {
        $item = Patient::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.pathology';

        return view('patients.pathology', $this->params);
    }

    public function pathologySave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $item->update($request->only(['patologia_alergia', 'patologia_alergia_tipo', 'patologia_neurologico', 'patologia_osteo_articular', 'patologia_cardiovascular', 'patologia_locomotor', 'patologia_infectologia', 'patologia_endocrinologico', 'patologia_urologico', 'patologia_oncologico', 'patologia_oncologico_tipo', 'patologia_neumonologico', 'patologia_ginecologico', 'patologia_metabolico', 'patologia_gastrointestinal', 'patologia_colagenopatia', 'patologia_hematologico', 'patologia_concomitante', 'patologia_otros']));

        return redirect()->route('patients.pathology.show', [$item->id]);
    }

    public function consultation($id)
    {
        $item = Patient::with([
            'consultations' => function($query) {
                $query->orderBy('consulta_fecha', 'desc');
            },
            'consultations.insurance_provider',
            'consultations.provider',
            'consultations.updatedby',
            ])->findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.consultation';

        // dd( $this->params );

        return view('patients.consultation', $this->params);
    }

    public function consultationSave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $validator = Validator::make($request->only(['fecha', 'tipo', 'peso', 'altura', 'presion_arterial', 'institucion', 'resumen', 'cobrable', 'obra_social']), [
            'fecha' => 'required',
            'tipo' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'presion_arterial' => 'required',
            'institucion' => 'required|exists:providers,id',
            'resumen' => 'required',
            'cobrable' => 'required',
            'obra_social' => 'exists:insurance_providers,id',
            ]);
        if ($validator->fails())
        {
            $errores = [];
            $validationMessages = $validator->messages()->toArray();
            foreach($validationMessages as $field => $messages)
            {
                foreach($messages as $message)
                {
                    $errores[] = $message;
                }
            }

            return [
                'status' => 'error',
                'message' => implode(' ', $errores)
            ];
        }
        else
        {
            $default = [
                'patient_id' => $item->id,
                'provider_id' => NULL,
                'insurance_provider_id' => NULL,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'consulta_fecha' => NULL,
                'recaida' => true,
                'consulta_tipo' => NULL,
                'consulta_peso' => NULL,
                'consulta_altura' => NULL,
                'consulta_superficie_corporal' => NULL,
                'consulta_presion_arterial' => NULL,
                'consulta_resumen' => NULL,
                'consulta_cobrable' => NULL
            ];

            $fecha_consulta = $request->get('fecha');
            if (trim($request->get('fecha')) != '')
            {
                $fecha_consulta = Carbon::createFromFormat('d/m/Y', $request->get('fecha'))->format('Y-m-d');
            }

            $fisico_superficie_corporal = NULL;
            if ($request->has('peso') && $request->has('altura'))
            {

                $altura = str_replace(',', '.', $request->get('altura') );
                $peso = str_replace(',', '.', $request->get('peso') );

                // https://es.wikipedia.org/wiki/%C3%81rea_de_superficie_corporal
                $altura = pow( ( $altura * 100 ), 0.725 );
                $peso = pow( $peso, 0.425 );

                $fisico_superficie_corporal = 0.007184 * $altura * $peso;
            }

            $input = [];

            // get treatment
            $treatment = Treatment::findOrFail( $request->get('tipo') );


            $input['consulta_fecha'] = $fecha_consulta;
            $input['consulta_tipo'] = $request->get('tipo');

            $input['treatment_id'] = $treatment->id;

            $fee = 0;

            if( $request->get('obra_social') !== null && !empty( $request->get('obra_social') && $request->get('cobrable') == true ) ){

                $insurance = InsuranceProvider::findOrFail( $request->get('obra_social') );
                if( !empty( $insurance )  && $treatment->level >= 0 ){
                    $method = 'level_' . $treatment->level;
                    $fee = $insurance->{$method};
                }
            }


            $input['treatment_fee'] = $fee;
            $input['treatment_billable'] = ($request->get('cobrable') == 'true') ? true : false;

            $input['recaida'] = ($request->get('tipo') == 'RECAIDA') ? true : false;
            $input['consulta_peso'] = $request->get('peso');
            $input['consulta_altura'] = $request->get('altura');
            $input['consulta_superficie_corporal'] = $fisico_superficie_corporal;
            $input['consulta_presion_arterial'] = $request->get('presion_arterial');
            $input['provider_id'] = $request->get('institucion');
            $input['consulta_resumen'] = $request->get('resumen');
            $input['consulta_cobrable'] = ($request->get('cobrable') == 'true') ? true : false;
            $input['insurance_provider_id'] = (trim($request->get('obra_social')) == '' ? NULL : $request->get('obra_social'));


            // Add relation to treatment

            $data = array_merge($default, $input);

            $item->consultations()->create($data);

            // $previousPhysical = $item->physicals()->orderBy('fecha_registro', 'desc')->first();

            // // Guardar Físico
            // $default = [
            //     'patient_id' => $item->id,
            //     'fecha_registro' => false,
            //     'fisico_completo' => false,
            //     'recaida' => false,
            //     'fisico_peso' => NULL,
            //     'fisico_altura' => NULL,
            //     'fisico_superficie_corporal' => NULL,
            //     'fisico_ta' => NULL,
            //     'fisico_talla' => NULL,
            //     'fisico_temperatura' => NULL,
            //     'fisico_presion_arterial' => NULL,
            //     'fisico_cabeza' => NULL,
            //     'fisico_cuello' => NULL,
            //     'fisico_torax' => NULL,
            //     'fisico_abdomen' => NULL,
            //     'fisico_urogenital' => NULL,
            //     'fisico_tacto_rectal' => NULL,
            //     'fisico_tacto_vaginal' => NULL,
            //     'fisico_mama' => NULL,
            //     'fisico_neurologico' => NULL,
            //     'fisico_locomotor' => NULL,
            //     'fisico_linfogangliar' => NULL,
            //     'fisico_tcs' => NULL,
            //     'fisico_piel' => NULL,
            //     'created_by' => Auth::user()->id,
            //     'updated_by' => Auth::user()->id
            // ];

            // $input = [];
            // $input['fecha_registro'] = $fecha_consulta;
            // $input['fisico_completo'] = false;
            // $input['recaida'] = ($request->get('tipo') == 'RECAIDA') ? true : false;

            // if ($request->has('peso'))
            // {
            //     $input['fisico_peso'] = $request->get('peso');
            // }

            // if ($request->has('altura'))
            // {
            //     $input['fisico_altura'] = $request->get('altura');
            // }

            // $input['fisico_superficie_corporal'] = $fisico_superficie_corporal;

            // if ($request->has('presion_arterial'))
            // {
            //     $input['fisico_presion_arterial'] = $request->get('presion_arterial');
            // }

            // $data = array_merge($default, $input);

            // $item->physicals()->create($data);

            // if ($request->has('peso') AND ! is_null($previousPhysical) AND $previousPhysical->fisico_peso > 0)
            // {

            //     // dd( $previousPhysical );
            //     // Event::fire(new NewPhysicals($item, $previousPhysical->fisico_peso, $request->get('peso')));
            // }

            return [
                'status' => 'success',
                'message' => 'Consulta agregada correctamente.',
                'url' => route('patients.consultation.show', [$item->id]),
            ];
        }
    }

    public function consultationUpdate($id, Request $request)
    {
        $item = PatientConsultation::findOrFail($id);

        $data = $request->only(['tipo', 'provider_id', 'consulta_resumen', 'consulta_peso', 'consulta_altura', 'consulta_superficie_corporal', 'consulta_presion_arterial']);

        $fisico_superficie_corporal = NULL;

        if ($data['consulta_peso'] && $data['consulta_altura'])
        {
            $altura = str_replace(',', '.', $data['consulta_altura'] );
            $peso = str_replace(',', '.', $data['consulta_peso'] );

            // https://es.wikipedia.org/wiki/%C3%81rea_de_superficie_corporal
            $altura = pow( ( $altura * 100 ), 0.725 );
            $peso = pow( $peso, 0.425 );

            $spc = 0.007184 * $altura * $peso;

            $data['consulta_superficie_corporal'] = $spc;

        }



        foreach($data as $field => $value)
        {
            if (is_null($value))
            {
                unset($data[$field]);
            }
        }

        $item->update($data);

        return redirect()->route('patients.consultation.show', [$item->patient_id]);
    }

    public function consultationDestroy($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        if ($item)
        {
            $child = $item->consultations()->where('id', $request->get('item_id'))->first();
            if ($child)
            {
                $child->deleted_by = \Auth::user()->id;
                $child->save();
                $child->delete();

                return [
                    'status' => 'success',
                    'message' => 'Consulta borrada correctamente.',
                    'url' => route('patients.consultation.show', [$item->id]),
                ];
            }
            else
            {
                return [
                    'status' => 'error',
                    'message' => 'No se encontro la Consulta con el ID seleccionado'
                ];
            }
        }
        else
        {
            return [
                'status' => 'error',
                'message' => 'No se encontro Paciente con el ID seleccionado'
            ];
        }
    }

    public function location($id)
    {
        $item = Patient::with([
            'pathologies' => function($query) {
                $query->orderBy('fecha_diagnostico', 'desc');
            },
            'pathologies.pathology',
            'pathologies.updatedby',
            ])->findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        $this->params['pathologies'] = Pathology::active()->orderBy('name')->lists('name', 'id');

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.location';

        return view('patients.location', $this->params);
    }

    public function locationSave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $inputs = $request->all();
        $localizacion = json_decode( $inputs['localizacion']);

        $arrayValidation = json_decode(json_encode($localizacion), True);

        $validator = Validator::make($arrayValidation, [
            'patologia' => 'required|exists:pathologies,id',
            'fecha' => 'required'
            ]);

        if ($validator->fails())
        {
            $errores = [];
            $validationMessages = $validator->messages()->toArray();
            foreach($validationMessages as $field => $messages)
            {
                foreach($messages as $message)
                {
                    $errores[] = $message;
                }
            }

            return [
                'status' => 'error',
                'message' => implode(' ', $errores)
            ];
        }
        else
        {
            $default = [
                'patient_id' => $item->id,
                'pathology_id' => NULL,
                'fecha_diagnostico' => NULL,
                'tipo' => NULL,
                'numero' => NULL,
                'ubicacion' => NULL,
                'histologia' => NULL,
                'biopsia' => NULL,
                'pag' => NULL,
                'paf' => NULL,
                'estadio' => NULL,
                'campo_t' => NULL,
                'campo_n' => NULL,
                'campo_m' => NULL,
                'inmunohistoquimica' => NULL,
                'receptores_hormonales' => NULL,
                'estrogeno' => NULL,
                'biologia_molecular' => NULL,
                'progesterona' => NULL,
                'indice_proliferacion' => NULL,
                'detalles' => NULL,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ];

            $fecha = $localizacion->fecha;
            if (trim($localizacion->fecha) != '')
            {
                $fecha = Carbon::createFromFormat('d/m/Y', $localizacion->fecha)->format('Y-m-d');
            }

            $input['pathology_id'] = $localizacion->patologia;
            $input['fecha_diagnostico'] = $fecha;
            $input['tipo'] = $localizacion->tipo;
            $input['numero'] = $localizacion->numero;
            $input['ubicacion'] = $localizacion->ubicacion;
            $input['histologia'] = $localizacion->histologia;
            $input['biopsia'] = ($localizacion->biopsia == 'true') ? true : false;
            $input['pag'] = ($localizacion->pag == 'true') ? true : false;
            $input['paf'] = ($localizacion->paf == 'true') ? true : false;
            $input['estadio'] = $localizacion->estadio;
            $input['campo_t'] = $localizacion->t;
            $input['campo_n'] = $localizacion->n;
            $input['campo_m'] = $localizacion->m;
            $input['inmunohistoquimica'] = $localizacion->inmunohistoquimica;
            $input['receptores_hormonales'] = $localizacion->receptores_hormonales;
            $input['estrogeno'] = $localizacion->estrogeno;
            $input['biologia_molecular'] = $localizacion->biologia_molecular;
            $input['progesterona'] = $localizacion->progesterona;
            $input['indice_proliferacion'] = $localizacion->indice_proliferacion;
            $input['detalles'] = $localizacion->detalles;

            $data = array_merge($default, $input);

            $pathology = new PathologyLocation($data);
            $pathology->save();


            if( !empty( $inputs['files'] ) && $inputs['files'] !== null && count($inputs['files']) > 0 ){
                foreach( $inputs['files'] as $file )
                    $pathology->addMedia($file)->toCollection('studies');
            }

            return [
                'status' => 'success',
                'message' => 'Localización agregada correctamente.',
                'url' => route('patients.location.show', [$item->id]),
            ];
        }
    }

    public function locationUpdate($id, Request $request)
    {
        $item = PathologyLocation::findOrFail($id);

        $data = $request->only(['fecha_diagnostico', 'tipo', 'numero', 'ubicacion', 'estadio', 'campo_t', 'campo_n', 'campo_m', 'histologia', 'biopsia', 'pag', 'paf', 'inmunohistoquimica', 'receptores_hormonales', 'estrogeno', 'progesterona', 'indice_proliferacion', 'biologia_molecular', 'detalles']);

        // dd($data);
        if ( ! isset($data['biopsia']))
        {
            $data['biopsia'] = false;
        }

        if ( ! isset($data['pag']))
        {
            $data['pag'] = false;
        }

        if ( ! isset($data['paf']))
        {
            $data['paf'] = false;
        }

        foreach($data as $field => $value)
        {
            if (is_null($value))
            {
                unset($data[$field]);
            }
        }

        $item->update($data);

        return redirect()->route('patients.location.show', [$item->patient_id]);
    }

    public function locationDestroy($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        if ($item)
        {
            $child = $item->pathologies()->where('id', $request->get('item_id'))->first();
            if ($child)
            {
                $child->deleted_by = \Auth::user()->id;
                $child->save();
                $child->delete();

                return [
                    'status' => 'success',
                    'message' => 'Localización borrar correctamente.',
                    'url' => route('patients.location.show', [$item->id]),
                ];
            }
            else
            {
                return [
                    'status' => 'error',
                    'message' => 'No se encontro la Localización con el ID seleccionado'
                ];
            }
        }
        else
        {
            return [
                'status' => 'error',
                'message' => 'No se encontro Paciente con el ID seleccionado'
            ];
        }
    }


    public function physical( $id )
    {
        $item = Patient::with([
            'physicals' => function ( $query ) {
                $query->orderBy('created_at', 'desc');
            },
            'pathologies.updatedby'
            ])->findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.physical';

        return view('patients.physical', $this->params);
    }

    public function physicalSave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $validator = Validator::make($request->only(['fecha', 'peso', 'altura', 'temperatura', 'presion_arterial']), [
            'fecha' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'temperatura' => 'required',
            'presion_arterial' => 'required'
            ]);
        if ($validator->fails())
        {
            $errores = [];
            $validationMessages = $validator->messages()->toArray();
            foreach($validationMessages as $field => $messages)
            {
                foreach($messages as $message)
                {
                    $errores[] = $message;
                }
            }

            return [
                'status' => 'error',
                'message' => implode(' ', $errores)
            ];
        }
        else
        {
            $previousPhysical = $item->physicals()->orderBy('fecha_registro', 'desc')->first();

            $default = [
                'patient_id' => $item->id,
                'fecha_registro' => false,
                'fisico_completo' => false,
                'recaida' => false,
                'fisico_peso' => NULL,
                'fisico_altura' => NULL,
                'fisico_superficie_corporal' => NULL,
                'fisico_ta' => NULL,
                'fisico_talla' => NULL,
                'fisico_temperatura' => NULL,
                'fisico_presion_arterial' => NULL,
                'fisico_cabeza' => NULL,
                'fisico_cuello' => NULL,
                'fisico_torax' => NULL,
                'fisico_abdomen' => NULL,
                'fisico_urogenital' => NULL,
                'fisico_tacto_rectal' => NULL,
                'fisico_tacto_vaginal' => NULL,
                'fisico_mama' => NULL,
                'fisico_neurologico' => NULL,
                'fisico_locomotor' => NULL,
                'fisico_linfogangliar' => NULL,
                'fisico_tcs' => NULL,
                'fisico_piel' => NULL,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id
            ];

            $fecha_registro = $request->get('fecha');
            if (trim($request->get('fecha')) != '')
            {
                $fecha_registro = Carbon::createFromFormat('d/m/Y', $request->get('fecha'))->format('Y-m-d');
            }

            $input['fecha_registro'] = $fecha_registro;
            $input['fisico_completo'] = ($request->get('completo') == 'true') ? true : false;
            $input['recaida'] = ($request->get('recaida') == 'true') ? true : false;

            if ($request->has('peso'))
            {
                $input['fisico_peso'] = $request->get('peso');
            }

            if ($request->has('altura'))
            {
                $input['fisico_altura'] = $request->get('altura');
            }

            if ($request->has('peso') && $request->has('altura'))
            {
                // https://es.wikipedia.org/wiki/%C3%81rea_de_superficie_corporal

                $altura = str_replace(',', '.', $input['fisico_altura'] );
                $peso = str_replace(',', '.', $input['fisico_peso'] );

                // https://es.wikipedia.org/wiki/%C3%81rea_de_superficie_corporal
                $altura = pow( ( $altura * 100 ), 0.725 );
                $peso = pow( $peso, 0.425 );

                $fisico_superficie_corporal = 0.007184 * $altura * $peso;


                $input['fisico_superficie_corporal'] = $fisico_superficie_corporal; //0.007184 * pow( ( $input['fisico_altura'] * 100 ), 0.725 ) * pow( $input['fisico_peso'], 0.425 );
            }

            if ($request->has('ta'))
            {
                $input['fisico_ta'] = $request->get('ta');
            }

            if ($request->has('ta'))
            {
                $input['fisico_talla'] = $request->get('');
            }

            if ($request->has('temperatura'))
            {
                $input['fisico_temperatura'] = $request->get('temperatura');
            }

            if ($request->has('presion_arterial'))
            {
                $input['fisico_presion_arterial'] = $request->get('presion_arterial');
            }

            if ($request->has('cabeza'))
            {
                $input['fisico_cabeza'] = $request->get('cabeza');
            }

            if ($request->has('cuello'))
            {
                $input['fisico_cuello'] = $request->get('cuello');
            }

            if ($request->has('torax'))
            {
                $input['fisico_torax'] = $request->get('torax');
            }

            if ($request->has('abdomen'))
            {
                $input['fisico_abdomen'] = $request->get('abdomen');
            }

            if ($request->has('urogenital'))
            {
                $input['fisico_urogenital'] = $request->get('urogenital');
            }

            if ($request->has('tacto_rectal'))
            {
                $input['fisico_tacto_rectal'] = $request->get('tacto_rectal');
            }

            if ($request->has('tacto_vaginal'))
            {
                $input['fisico_tacto_vaginal'] = $request->get('tacto_vaginal');
            }

            if ($request->has('mama'))
            {
                $input['fisico_mama'] = $request->get('mama');
            }

            if ($request->has('neurologico'))
            {
                $input['fisico_neurologico'] = $request->get('neurologico');
            }

            if ($request->has('locomotor'))
            {
                $input['fisico_locomotor'] = $request->get('locomotor');
            }

            if ($request->has('linfogangliar'))
            {
                $input['fisico_linfogangliar'] = $request->get('linfogangliar');
            }

            if ($request->has('tcs'))
            {
                $input['fisico_tcs'] = $request->get('tcs');
            }

            if ($request->has('piel'))
            {
                $input['fisico_piel'] = $request->get('piel');
            }

            $data = array_merge($default, $input);

            $item->physicals()->create($data);

            if ($request->has('peso') AND ! is_null($previousPhysical) AND $previousPhysical->fisico_peso > 0)
            {
                Event::fire(new NewPhysicals($item, $previousPhysical->fisico_peso, $request->get('peso')));
            }

            return [
                'status' => 'success',
                'message' => 'Físico agregado correctamente.',
                'url' => route('patients.physical.show', [$item->id]),
            ];
        }
    }

    public function physicalUpdate($id, Request $request)
    {
        $item = PatientPhysical::findOrFail($id);

        $data = $request->only(['fisico_peso', 'fisico_superficie_corporal', 'fisico_ta', 'fisico_talla', 'fisico_temperatura', 'fisico_presion_arterial', 'fisico_cabeza', 'fisico_cuello', 'fisico_torax', 'fisico_abdomen', 'fisico_urogenital', 'fisico_tacto_rectal', 'fisico_tacto_vaginal', 'fisico_mama', 'fisico_neurologico', 'fisico_locomotor', 'fisico_linfogangliar', 'fisico_tcs', 'fisico_piel']);

        if ($request->has('peso') && $request->has('altura'))
        {
            // https://es.wikipedia.org/wiki/%C3%81rea_de_superficie_corporal
            $data['fisico_superficie_corporal'] = 0.007184 * pow((double)($input['fisico_altura']*100), 0.725) * pow((double)$input['fisico_peso'], 0.425);
        }

        // $altura = ($input['fisico_altura']*100);
        // Log::info('Altura ' . $altura );
        // Log::info('Peso ' . $input['fisico_peso'] );

        foreach($data as $field => $value)
        {
            if (is_null($value))
            {
                unset($data[$field]);
            }
        }

        $item->update($data);

        return redirect()->route('patients.physical.show', [$item->patient_id]);
    }

    public function physicalDestroy($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        if ($item)
        {
            $child = $item->physicals()->where('id', $request->get('item_id'))->first();
            if ($child)
            {
                $child->deleted_by = \Auth::user()->id;
                $child->save();
                $child->delete();

                return [
                    'status' => 'success',
                    'message' => 'Físico borrada correctamente.',
                    'url' => route('patients.physical.show', [$item->id]),
                ];
            }
            else
            {
                return [
                    'status' => 'error',
                    'message' => 'No se encontro el registro Físico con el ID seleccionado'
                ];
            }
        }
        else
        {
            return [
                'status' => 'error',
                'message' => 'No se encontro Paciente con el ID seleccionado'
            ];
        }
    }

    public function studies($id)
    {
        $item = Patient::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;
        $this->params['tests'] = $item->tests()->with(['updatedby'])->orderBy('estudio_fecha', 'desc')->get();

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        // pathologies
        $this->params['pathologies'] = Pathology::active()->orderBy('name')->lists('name', 'id');

        $this->params['practices'] = Practice::select(DB::raw("id, CONCAT(short_code, ' - ', description) AS practice"))->orderBy('short_code')->lists('practice', 'id');

        $this->params['current_section'] = 'patient.study';

        return view('patients.studies', $this->params);
    }

    public function studiesSave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $inputs = $request->all();
        $estudios = json_decode( $inputs['estudios']);

        // dd( $request->all() );

        $arrayValidation = json_decode(json_encode($estudios), True);

        $validator = Validator::make( $arrayValidation, [
            'fecha' => 'required',
            'detalle' => 'required',
            'laboratorio' => 'required',
            'patologia' => 'required'
            ]);


        if ($validator->fails())
        {
            $errores = [];
            $validationMessages = $validator->messages()->toArray();
            foreach($validationMessages as $field => $messages)
            {
                foreach($messages as $message)
                {
                    $errores[] = $message;
                }
            }

            return [
                'status' => 'error',
                'message' => implode(' ', $errores)
            ];
        }
        else
        {
            $default = [
                'patient_id' => $item->id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'pathology_id' => $request->get('patologia'),
                'recaida' => false,
                'rc' => false,
                'rp' => false,
                'ee' => false,
                'progresion' => false,
                'estudio_fecha' => NULL,
                'estudio_detalle' => NULL,
                'estudio_laboratorio' => NULL
            ];

            $fecha_estudio = $estudios->fecha;
            if (trim($estudios->fecha) != '')
            {
                $fecha_estudio = Carbon::createFromFormat('d/m/Y', $estudios->fecha)->format('Y-m-d');
            }

            $input['recaida'] = ($estudios->recaida == 'true') ? true : false;
            $input['rc'] = ($estudios->rc == 'true') ? true : false;
            $input['rp'] = ($estudios->rp == 'true') ? true : false;
            $input['ee'] = ($estudios->ee == 'true') ? true : false;
            $input['progresion'] = ($estudios->progresion == 'true') ? true : false;

            $input['estudio_fecha'] = $fecha_estudio;
            $input['estudio_detalle'] = $estudios->detalle;
            $input['estudio_laboratorio'] = $estudios->laboratorio;

            $data = array_merge($default, $input);

            //

            $study = new PatientTest($data);
            $study->save();

            if( !empty( $inputs['files'] ) && $inputs['files'] !== null && count($inputs['files']) > 0 ){
                foreach( $inputs['files'] as $file )
                    $study->addMedia($file)->toCollection('studies');
            }


            // $study->create();
            // dd($study);
            // $item->tests()->create($data);

            return [
                'status' => 'success',
                'message' => 'Estudio agregado correctamente.',
                'url' => route('patients.studies.show', [$item->id]),
            ];
        }



        $item = Patient::findOrFail($id);

        $data = $request->only(['practice_id', 'test_date', 'test_results', 'test_lab']);

        $data['user_id'] = Auth::user()->id;

        $item->tests()->create($data);

        return redirect()->route('patients.studies.show', [$item->id]);
    }

    public function studiesUpdate($id, Request $request)
    {
        $item = PatientTest::findOrFail($id);

        $data = $request->only(['pathology_id','estudio_detalle', 'estudio_laboratorio']);

        $item->update($data);

        return redirect()->route('patients.studies.show', [$item->patient_id]);
    }

    public function studiesDestroy($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        if ($item)
        {
            $child = $item->tests()->where('id', $request->get('item_id'))->first();
            if ($child)
            {
                $child->deleted_by = \Auth::user()->id;
                $child->save();
                $child->delete();

                return [
                    'status' => 'success',
                    'message' => 'Estudio borrado correctamente.',
                    'url' => route('patients.studies.show', [$item->id]),
                ];
            }
            else
            {
                return [
                    'status' => 'error',
                    'message' => 'No se encontro el Estudio con el ID seleccionado'
                ];
            }
        }
        else
        {
            return [
                'status' => 'error',
                'message' => 'No se encontro Paciente con el ID seleccionado'
            ];
        }
    }

    public function treatment($id)
    {


        $item = Patient::with([
            'treatments' => function($query) {
                $query->orderBy('fecha_inicio', 'desc');
                $query->orderBy('id', 'DESC');
            },
            'treatments.logs',
            'treatments.logs.createdby',
            'treatments.pathology_location',
            'treatments.pathology_location.pathology',
            ])->findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );



        $this->params['item'] = $item;

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.treatment';

        return view('patients.treatment', $this->params);
    }


    public function paymentPdf( $id ){

        $item = Patient::findOrFail($id);

        $items = collect([]);


        // Consultations
        $consultations = PatientConsultation::with(['insurance_provider', 'provider', 'updatedby'])
                                            ->where('patient_id', $item->id)
                                            ->where('consulta_pagada', false)
                                            ->orderBy('consulta_fecha', 'desc')
                                            ->orderBy('id', 'DESC')
                                            ->get()
                                            ->toArray();

        foreach ($consultations as &$row)
        {
            $row['date_type'] = \Carbon\Carbon::createFromFormat( 'Y-m-d H:i:s', $row['consulta_fecha'] )->format('Ymd');
            $row['type'] = 'consultation';
        }
        $items = $items->merge($consultations);

        // Treatments
        $treatments = PatientTreatment::with(['treatment', 'pathology_location', 'pathology_location.pathology', 'updatedby', 'logs'])
                                      ->where('patient_id', $item->id)
                                      ->where('tratamiento_pagado', false)
                                      ->orderBy('fecha_inicio', 'desc')
                                      ->orderBy('id', 'DESC')
                                      ->get();

        $mergeTreatments = [];

        // foreach ($treatments as &$row)
        // {
        //     $row['date_type'] = \Carbon\Carbon::createFromFormat( 'd/m/Y', $row['fecha_inicio'] )->format('Ymd');
        //     $row['type'] = 'treatment';
        // }
        foreach( $treatments as $treatment )
        {
            foreach( $treatment->logs->sortBy('created_at') as $log )
            {

                $t = array();

                $t['date_type'] = \Carbon\Carbon::createFromFormat( 'd/m/Y', $treatment->fecha_inicio )->format('Ymd');
                $t['type'] = 'treatment';
                $t['id'] = $log->id;
                $t['treatment_id'] = $treatment->id;
                $t['log_id'] = $log->id;
                $t['tratamiento'] = $treatment->tratamiento;
                $t['tratamiento_nombre'] = $treatment->tratamiento . ' :: ' . 'Ciclo ' . $log->ciclo;

                $t['pathology_location'] = $treatment->pathology_location->toArray();
                $t['fecha_inicio'] = $treatment->fecha_inicio;
                $t['fecha_fin'] = $treatment->fecha_fin;
                $t['dosis_diaria'] = $treatment->dosis_diaria;
                $t['dosis_total'] = $treatment->dosis_total;
                $t['boost'] = $treatment->boost;
                $t['braquiterapia'] = $treatment->braquiterapia;
                $t['dosis'] = $treatment->dosis;
                $t['frecuencia'] = $treatment->frecuencia;
                $t['observaciones'] = $treatment->observaciones;


                $t['updatedby']['first_name'] = $treatment->updatedby->first_name;
                $t['updatedby']['last_name'] = $treatment->updatedby->last_name;
                $t['updated_at'] = $log->updated_at;

                $t['treatment_fee'] = !is_null( $log->treatment_fee ) ? $log->treatment_fee : $treatment->treatment_fee;
                $t['treatment_billable'] = $treatment->treatment_billable;
                $t['treatment_payed_at']  = !is_null($log->treatment_payed_at) ? \Carbon\Carbon::createFromFormat( 'Y-m-d', $log->treatment_payed_at )->format('d/m/Y') : '';
                $t['treatment_payed'] = !is_null( $log->treatment_payed ) ? $log->treatment_payed : null;

                if( is_null( $treatment->treatment_fee ) && !is_null( $treatment->treatment ) ){

                    $treatment_level = $treatment->treatment->level;
                    $insurance = null;

                    // Get the proper insurance
                    if( !is_null( $treatment->insurance_provider ) ){
                        $insurance = $treatment->insurance_provider;
                    // $row->treatment_fee = $row->insurance_provider->name;
                    } else {
                        $insurance = $item->insurance_providers->first();
                    }

                // If there is an insurance for the patient
                    if( !is_null( $insurance ) && $treatment_level >= 0 ){
                        $method = 'level_' . $treatment_level;
                        $t['treatment_fee'] = $insurance->{$method};
                    }
                }


                $t['plogs'] = PaymentLog::where('item_id', $log->id)
                ->where('item_type', 'treatment' )
                ->orderBy('created_at', 'DESC')
                ->get();

                // dd($t['plogs']);

                $mergeTreatments[] = $t;
            }
        }

        // $items = $items->merge($treatments);
        if( !empty( $mergeTreatments ) )
            $items = $items->merge($mergeTreatments);

        $items = $items->sortByDesc('date_type');


        $pdfData = [
            'titulo' => 'Pagos: ' . $item->first_name . ' ' . $item->last_name,
            'user' => Auth::user(),
            'nombres' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ];


        $pdf = PDF::loadView('patients.payment-pdf', compact('item', 'items'));
        $pdf->setPaper('Legal');
        $pdf->setOrientation('portrait');
        $pdf->setOption('header-html', \View::make('pdf.header', compact('pdfData')));
        $pdf->setOption('footer-html', \View::make('pdf.footer', compact('pdfData')));
        $pdf->setOption('header-spacing', 2);
        return $pdf->stream();


    }

    public function paymentItemPdf($patientId, $itemId, $type, $log = ''){

        $item = Patient::findOrFail($patientId);

        $items = collect([]);



        if( $type == 'treatment'){
            $items = PatientTreatment::with(['treatment', 'pathology_location', 'pathology_location.pathology', 'updatedby', 'logs'])
                                      ->where('id', $itemId)
                                      ->first()
                                      ->toArray();

                                      // dd($items);
            // dd($items['logs']);
            // foreach ($items as &$row)
            // {
                $items['date_type'] = \Carbon\Carbon::createFromFormat( 'd/m/Y', $items['fecha_inicio'] )->format('Ymd');
                $items['type'] = 'treatment';
            // }
            //
                foreach($items['logs'] as $key => $_log ){
                    // dd( intval( $_log['id'] ));
                    if( intval($_log['id']) != intval($log ) ){
                        // dd($items['logs'][$key]);
                        unset($items['logs'][$key]);
                    }
                }

                // dd($items);

                $items['tratamiento'] .= ' :: ' . 'Ciclo ' . head($items['logs'])['ciclo'];
                $items['treatment_payed'] = head($items['logs'])['treatment_payed'];
                $items['treatment_payed_at'] = head($items['logs'])['treatment_payed_at'];
                $items['treatment_fee'] = head($items['logs'])['treatment_fee'];

                // Add the logs
                $items['plogs'] = PaymentLog::where('item_id', head($items['logs'])['id'])
                ->where('item_type', 'treatment' )
                ->orderBy('created_at', 'DESC')
                ->get();

        } else {
            $items = PatientConsultation::with(['insurance_provider', 'provider', 'updatedby'])
                                      ->where('id', $itemId)
                                      ->first()
                                      ->toArray();

            // foreach ($items as &$row)
            // {
                $row['date_type'] = \Carbon\Carbon::createFromFormat( 'Y-m-d H:i:s', $row['consulta_fecha'] )->format('Ymd');
                $row['type'] = 'consultation';
            // }
        }





        $pdfData = [
            'titulo' => 'Pagos: ' . $item->first_name . ' ' . $item->last_name,
            'user' => Auth::user(),
            'nombres' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ];


        $pdf = PDF::loadView('patients.payment-item-pdf', compact('item', 'items'));
        $pdf->setPaper('Legal');
        $pdf->setOrientation('portrait');
        $pdf->setOption('header-html', \View::make('pdf.header', compact('pdfData')));
        $pdf->setOption('footer-html', \View::make('pdf.footer', compact('pdfData')));
        $pdf->setOption('header-spacing', 2);
        return $pdf->stream();
    }

    public function treatmentPdf($id, Request $request)
    {
        $inputs = $request->all();

        $item = Patient::with([
            'treatments' => function($query) {
                $query->orderBy('fecha_inicio', 'desc');
            },
            'treatments.protocol',
            'treatments.logs',
            'treatments.logs.createdby',
            'treatments.pathology_location',
            'treatments.pathology_location.pathology',
            ])->findOrFail($inputs['id']);

        $pdfData = [
            'titulo' => 'Tratamiento: ' . $item->first_name . ' ' . $item->last_name,
            'user' => Auth::user(),
            'nombres' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ];

        if( isset( $inputs['options'] ) )
            $item->options = $inputs['options'];

        $pdf = PDF::loadView('patients.treatment-pdf', compact('item'));
        $pdf->setPaper('Legal');
        $pdf->setOrientation('portrait');
        $pdf->setOption('header-html', \View::make('pdf.header', compact('pdfData')));
        $pdf->setOption('footer-html', \View::make('pdf.footer', compact('pdfData')));
        $pdf->setOption('header-spacing', 2);
        return $pdf->stream();
    }

    public function treatmentOnlyPdf($id, Request $request)
    {
        $inputs = $request->all();

        $id = $inputs['pt_patient'];
        $treatmentId = $inputs['pt_treatment'];

        $item = Patient::with([
            'treatments' => function($query) use ($treatmentId) {
                $query->where('id', $treatmentId);
                $query->orderBy('fecha_inicio', 'desc');
            },
            'treatments.protocol',
            'treatments.logs',
            'treatments.logs.createdby',
            'treatments.pathology_location',
            'treatments.pathology_location.pathology',
            ])->findOrFail($id);

        $pdfData = [
            'titulo' => 'Tratamiento: ' . $item->first_name . ' ' . $item->last_name,
            'user' => Auth::user(),
            'nombres' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ];

        if( isset( $inputs['options'] ) )
            $item->options = $inputs['options'];

        $pdf = PDF::loadView('patients.treatment-only-pdf', compact('item'));
        $pdf->setPaper('Legal');
        $pdf->setOrientation('portrait');
        $pdf->setOption('header-html', \View::make('pdf.header', compact('pdfData')));
        $pdf->setOption('footer-html', \View::make('pdf.footer', compact('pdfData')));
        $pdf->setOption('header-spacing', 2);
        return $pdf->stream();
    }

    public function treatmentProtocolOnlyPdf( $id, $treatmentId ){
        $item = Patient::with([
            'treatments' => function($query) use ($treatmentId) {
                $query->where('id', $treatmentId);
                $query->orderBy('fecha_inicio', 'desc');
            },
            'treatments.logs',
            'treatments.logs.createdby',
            'treatments.pathology_location',
            'treatments.pathology_location.pathology',
            ])->findOrFail($id);

        $pdfData = [
            'titulo' => 'Tratamiento: ' . $item->first_name . ' ' . $item->last_name,
            'user' => Auth::user(),
            'nombres' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ];

        // dd( $item->treatments );
        $pdf = PDF::loadView('patients.treatment-protocol-pdf', compact('item'));
        $pdf->setPaper('Legal');
        $pdf->setOrientation('portrait');
        $pdf->setOption('header-html', \View::make('pdf.header', compact('pdfData')));
        $pdf->setOption('footer-html', \View::make('pdf.footer', compact('pdfData')));
        $pdf->setOption('header-spacing', 2);
        return $pdf->stream();
    }


    public function instructionsUpdate($id, Request $request ){

        $inputs = $request->only(['treatment_id', 'updated_by', 'instructions']);

        $item = PatientTreatment::findOrFail( $inputs['treatment_id'] );

        $v_rules = array(
            'updated_by' => 'required',
            'instructions' => 'required'
        );

        $validator = Validator::make($inputs,$v_rules);

        if( $validator->fails() ){
            $errores = [];
            $validationMessages = $validator->messages()->toArray();
            foreach($validationMessages as $field => $messages)
            {
                foreach($messages as $message)
                {
                    $errores[] = $message;
                }
            }
        } else {
            $instructions = $inputs['instructions'];

            $item->update(['updated_by' => $inputs['updated_by'], 'instrucciones' => $instructions] );


            return [
                'status' => 'success',
                'message' => 'Esquema guardado correctamente',
                'url' => route('patients.treatment.show', [$item->patient->id]),
            ];
        }


    }

    public function treatmentSave($id, Request $request)
    {

        $item = Patient::findOrFail($id);

        $v_rules = array(
            'pathology_location_id' => 'required|exists:pathology_locations,id',
            'institucion' => 'required|exists:providers,id',
            'protocol_id' => 'required|exists:protocols,id',
            'insurance_provider_id' => 'exists:insurance_providers,id',
            'fecha_inicio' => 'required',
            'tratamiento' => 'required',
            'tipo' => 'required',
            'instructions' => 'required',
        );

        $inputs = $request->all();


        if( $inputs['tratamiento'] == 8 ||  $inputs['tratamiento'] == 10 )
            unset($v_rules['protocol_id'], $v_rules['instructions'] );
        else {

            if( isset( $inputs['instructions'] ) ) {
                foreach( $inputs['instructions'] as $term ){
                    if( empty( $term ) ){
                        $errores[] = 'Debe de completar las instrucciones';
                        return [
                            'status' => 'error',
                            'message' => implode('<br />', $errores)
                        ];
                    }
                }
            } else {
                unset( $v_rules['instructions'] );
            }
        }

        $validator = Validator::make( $inputs, $v_rules );


        if ($validator->fails())
        {
            $errores = [];
            $validationMessages = $validator->messages()->toArray();
            foreach($validationMessages as $field => $messages)
            {
                foreach($messages as $message)
                {
                    $errores[] = $message;
                }
            }

            return [
                'status' => 'error',
                'message' => implode('<br />', $errores)
            ];
        }
        else
        {
            $data = $request->only(['fecha_inicio', 'fecha_fin', 'recaida', 'pathology_location_id','institucion', 'tratamiento', 'rp', 'rc', 'paleativa', 'tipo', 'ciclos', 'dosis_diaria', 'dosis_total', 'boost', 'braquiterapia', 'dosis', 'protocol_id', 'frecuencia', 'observaciones', 'instructions', 'insurance_provider_id', 'cobrable']);

            $fecha_inicio = $request->get('fecha_inicio');
            if (trim($request->get('fecha_inicio')) != '')
            {
                $fecha_inicio = Carbon::createFromFormat('d/m/Y', $request->get('fecha_inicio'))->format('Y-m-d');
            }
            $data['fecha_inicio'] = $fecha_inicio;

            $fecha_inicio = $request->get('fecha_fin');
            if (trim($request->get('fecha_fin')) != '')
            {
                $fecha_fin = Carbon::createFromFormat('d/m/Y', $request->get('fecha_fin'))->format('Y-m-d');
            }
            else
            {
                $fecha_fin = NULL;
            }
            $data['fecha_fin'] = $fecha_fin;

            if (isset($data['recaida']) AND trim($data['recaida']) == '1')
            {
                $data['recaida'] = true;
            }
            else
            {
                $data['recaida'] = false;
            }

            if (isset($data['braquiterapia']) AND trim($data['braquiterapia']) == '1')
            {
                $data['braquiterapia'] = true;
            }
            else
            {
                $data['braquiterapia'] = false;
            }

            if (isset($data['observaciones']) AND trim($data['observaciones']) == '')
            {
                $data['observaciones'] = NULL;
            }

            $instrucciones = [];
            if (isset($data['instructions']) AND is_array($data['instructions']))
            {
                foreach($data['instructions'] as $instruccion)
                {
                    $instrucciones[] = $instruccion;
                }
            }

            if (trim($data['insurance_provider_id']) == '')
            {
                $data['insurance_provider_id'] = NULL;
            }

            $tratamiento = Treatment::findOrFail( $data['tratamiento'] );

            $treatment_fee = 0;


            //InsuranceProvider
            if( isset( $data['insurance_provider_id'] ) && !empty( $data['insurance_provider_id'] ) && $data['cobrable'] == true ){

                $insurance = InsuranceProvider::findOrFail( $data['insurance_provider_id'] );
                if( !empty( $insurance )  && $tratamiento->level >= 0 ){
                    $method = 'level_' . $tratamiento->level;
                    $treatment_fee = $insurance->{$method};
                }
            }
            //
            //TreatmentLevel

            $treatment = [
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'insurance_provider_id' => $data['insurance_provider_id'],
                'pathology_location_id' => $data['pathology_location_id'],
                'provider_id' => $data['institucion'],
                'protocol_id' => $data['protocol_id'],
                'fecha_inicio' => $data['fecha_inicio'],
                'fecha_fin' => $data['fecha_fin'],
                'recaida' => $data['recaida'],
                'treatment_id' => $data['tratamiento'],
                'treatment_fee' => $treatment_fee,
                'treatment_billable' => $data['cobrable'] == true ? true : false,
                'paleativa' => $data['paleativa'],
                'tratamiento' => $tratamiento->description,
                'rc' => $data['rc'] == 'true' ? true : false,
                'rp' => $data['rp'] == 'true' ? true : false,
                'tipo_tratamiento' => $data['tipo'],
                'ciclos' => $data['ciclos'],
                'dosis_diaria' => $data['dosis_diaria'],
                'dosis_total' => $data['dosis_total'],
                'boost' => $data['boost'],
                'braquiterapia' => $data['braquiterapia'],
                'dosis' => $data['dosis'],
                'frecuencia' => $data['frecuencia'],
                'instrucciones' => $instrucciones,
                'observaciones' => $data['observaciones'],
            ];



            if( $request->get('tratamiento') == 8 )
                $treatment['protocol_id'] = 0;

            $item->treatments()->create($treatment);

            return [
                'status' => 'success',
                'message' => 'Localización agregada correctamente.',
                'url' => route('patients.treatment.show', [$item->id]),
            ];
        }
    }

    public function treatmentUpdate($id, Request $request)
    {
        // dd($id, $request->all() );
        $item = PatientTreatment::findOrFail($id);

        // added updated by
        $data = $request->only(['fecha_inicio', 'fecha_fin', 'tratamiento', 'tipo_tratamiento', 'ciclos', 'dosis_diaria', 'dosis_total', 'boost', 'braquiterapia', 'dosis', 'frecuencia', 'instrucciones', 'observaciones', 'provider_id']);

        foreach($data as $field => $value)
        {
            if (is_null($value) || empty($value))
            {
                unset($data[$field]);
            }

            // // $tratamiento = Treatment::where(  $data['tratamiento'] );

            // // dd( $tratamiento );

            // // if(!is_null( $tratamiento ) ){
            //     $data['treatment_id'] = $tratamiento->id;
            //     $data['tratamiento'] = $tratamiento->description;
            // // }

        }

        $item->update($data);

        return redirect()->route('patients.treatment.show', [$item->patient_id]);
    }

    public function treatmentUpdateStatus($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $validator = Validator::make($request->only(['id', 'estado']), [
            'id' => 'required|exists:patient_treatments,id',
            'estado' => 'required|in:activo,cancelado,cerrado'
            ]);
        if ($validator->fails())
        {
            $errores = [];
            $validationMessages = $validator->messages()->toArray();
            foreach($validationMessages as $field => $messages)
            {
                foreach($messages as $message)
                {
                    $errores[] = $message;
                }
            }

            return redirect()
                ->route('patients.treatment.show', [$item->id])
                ->withMessages(['type' => 'error', 'text' => implode(' ', $errores)]);
        }
        else
        {
            $data = $request->only(['id', 'estado', 'notes']);

            if (isset($data['notes']) AND trim($data['notes']) == '')
            {
                $data['notes'] = NULL;
            }

            $patientTreatment = $item->treatments()->where('id', $data['id'])->first();
            if ($patientTreatment)
            {
                $nuevo_estado = ($data['estado'] == 'cancelado') ? 'cancelado' : 'finalizado';

                $today = Carbon::now();
                $today->setTimezone('America/Argentina/Buenos_Aires');

                $notes = '<hr />Tratamiento marcado como ' . $nuevo_estado . ' por ' . Auth::user()->first_name . ' ' . Auth::user()->last_name . ' el ' . $today->format('d/m/Y') . ' a las ' . $today->format('h:i a') . '.';
                if ( ! is_null($data['notes']))
                {
                    $notes .= "\n" . $data['notes'];
                }

                $patientTreatment->estado = $data['estado'];
                $patientTreatment->observaciones = $patientTreatment->observaciones . "\n" . $notes;
                $patientTreatment->save();
            }

            return redirect()
                ->route('patients.treatment.show', [$item->id])
                ->withMessages(['type' => 'success', 'text' => 'Tratamiento actualizado correctamente.']);
        }
    }

    public function treatmentDestroy($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        if ($item)
        {
            $child = $item->treatments()->where('id', $request->get('item_id'))->first();
            if ($child)
            {
                $child->deleted_by = \Auth::user()->id;
                $child->save();
                $child->delete();

                return [
                    'status' => 'success',
                    'message' => 'Tratamiento borrado correctamente.',
                    'url' => route('patients.treatment.show', [$item->id]),
                ];
            }
            else
            {
                return [
                    'status' => 'error',
                    'message' => 'No se encontro el Tratamiento con el ID seleccionado'
                ];
            }
        }
        else
        {
            return [
                'status' => 'error',
                'message' => 'No se encontro Paciente con el ID seleccionado'
            ];
        }
    }

    public function relapse($id)
    {
        $item = Patient::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        $items = collect([]);

        // Consultations
        $consultations = PatientConsultation::with(['insurance_provider', 'provider', 'updatedby'])->where('patient_id', $item->id)->where('recaida', true)->orderBy('consulta_fecha', 'desc')->get()->toArray();
        foreach ($consultations as &$row)
        {
            $row['date_type'] = strtotime($row['consulta_fecha']);
            $row['type'] = 'consultation';
        }
        $items = $items->merge($consultations);

        // Locations
        $locations = PathologyLocation::with(['pathology', 'updatedby'])->where('patient_id', $item->id)->where('tipo', 'RECAIDA')->orderBy('fecha_diagnostico', 'desc')->get()->toArray();
        foreach ($locations as &$row)
        {
            $row['date_type'] = strtotime($row['fecha_diagnostico']);
            $row['type'] = 'location';
        }
        $items = $items->merge($locations);

        // Physicals
        $physicals = PatientPhysical::with(['updatedby'])->where('patient_id', $item->id)->where('recaida', true)->orderBy('fecha_registro', 'desc')->get()->toArray();
        foreach ($physicals as &$row)
        {
            $row['date_type'] = strtotime($row['fecha_registro']);
            $row['type'] = 'physical';
        }
        $items = $items->merge($physicals);

        // Studies
        $studies = PatientTest::with(['updatedby'])->where('patient_id', $item->id)->where('recaida', true)->orderBy('estudio_fecha', 'desc')->get()->toArray();
        foreach ($studies as &$row)
        {
            $row['date_type'] = strtotime($row['estudio_fecha']);
            $row['type'] = 'study';
        }
        $items = $items->merge($studies);

        // Treatments
        $treatments = PatientTreatment::where('patient_id', $item->id)->orderBy('fecha_inicio', 'desc')->get()->toArray();
        foreach ($treatments as &$row)
        {
            $row['date_type'] = strtotime($row['fecha_inicio']);
            $row['type'] = 'treatment';
        }
        $items = $items->merge($treatments);

        $this->params['items'] = $items->sortBy('date_type');

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.relapse';

        return view('patients.relapse', $this->params);
    }

    public function pendingPayment($id)
    {
        $item = Patient::findOrFail($id);
        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        $this->params['item'] = $item;

        // $this->params['items'] = $item->consultations()->where('consulta_pagada', false)->orderBy('consulta_fecha', 'desc')->get();

        $items = collect([]);

        // Consultations
        $consultations = PatientConsultation::with(['insurance_provider', 'provider', 'updatedby'])
                                            ->where('patient_id', $item->id)
                                            ->where('consulta_pagada', false)
                                            ->orderBy('consulta_fecha', 'desc')
                                            ->orderBy('id', 'DESC')
                                            ->get();

        foreach ($consultations as &$row)
        {
            $row->date_type = \Carbon\Carbon::createFromFormat( 'Y-m-d H:i:s', $row->consulta_fecha )->format('Ymd');
            $row->type = 'consultation';
            $row->treatment_payed_at  = !is_null($row->treatment_payed_at) ?  \Carbon\Carbon::createFromFormat( 'Y-m-d', $row->treatment_payed_at )->format('d/m/Y') : '';

            // set treatment_fee
            if( is_null( $row->treatment_fee ) ){

                $treatment_level = $row->treatment->level;
                $insurance = null;

                // Get the proper insurance
                if( !is_null( $row->insurance_provider ) ){
                    $insurance = $row->insurance_provider;
                    // $row->treatment_fee = $row->insurance_provider->name;
                } else {
                    $insurance = $item->insurance_providers->first();
                }

                // If there is an insurance for the patient
                if( !is_null( $insurance ) && $treatment_level >= 0 ){
                    $method = 'level_' . $treatment_level;
                    $row->treatment_fee = $insurance->{$method};
                }


            }

            // Add the logs
            $row->logs = PaymentLog::where('item_id', $row->id)
                                        ->where('item_type', 'consultation' )
                                        ->orderBy('created_at', 'DESC')
                                        ->get();
        }
        $items = $items->merge($consultations->toArray());

        // Treatments
        $treatments = PatientTreatment::with(['treatment', 'pathology_location', 'pathology_location.pathology', 'updatedby', 'logs'])
                                      ->where('patient_id', $item->id)
                                      ->where( 'tratamiento_pagado', false )
                                      ->where( 'treatment_billable', true )
                                      ->orderBy('fecha_inicio', 'desc')
                                      ->orderBy('id', 'DESC')
                                      ->get();


        $mergeTreatments = [];

        foreach( $treatments as $treatment )
        {
            // Only if the Treatment has logs proceed

            foreach( $treatment->logs->sortBy('ciclo') as $log )
            {

                /*
                $t = $treatment;
                $t->date_type = \Carbon\Carbon::createFromFormat( 'd/m/Y', $treatment->fecha_inicio )->format('Ymd');
                $t->type = 'treatment';
                $t->log_id = $log->id;
                $t->tratamiento = $treatment->tratamiento . ' :: ' . 'Ciclo ' . $log->ciclo;
                $t->treatment_payed_at  = !is_null($log->treatment_payed_at) ? \Carbon\Carbon::createFromFormat( 'Y-m-d', $log->treatment_payed_at )->format('d/m/Y') : '';
                $t->treatment_payed = !is_null( $log->treatment_payed ) ? $log->treatment_payed : null;
                    // set treatment_fee
                if( is_null( $t->treatment_fee ) && !is_null( $t->treatment ) ){

                    $treatment_level = $t->treatment->level;
                    $insurance = null;

                    // Get the proper insurance
                    if( !is_null( $t->insurance_provider ) ){
                        $insurance = $t->insurance_provider;
                    // $row->treatment_fee = $row->insurance_provider->name;
                    } else {
                        $insurance = $item->insurance_providers->first();
                    }

                // If there is an insurance for the patient
                    if( !is_null( $insurance ) && $treatment_level >= 0 ){
                        $method = 'level_' . $treatment_level;
                        $t->treatment_fee = $insurance->{$method};
                    }
                }

                // Add the logs
                $t->plogs = PaymentLog::where('item_id', $t->log_id)
                ->where('item_type', 'treatment' )
                ->orderBy('created_at', 'DESC')
                ->get();

                $mergeTreatments[] = $t->toArray();
                */

                $t = array();

                $t['date_type'] = \Carbon\Carbon::createFromFormat( 'd/m/Y', $treatment->fecha_inicio )->format('Ymd');
                $t['type'] = 'treatment';
                $t['id'] = $log->id;
                $t['treatment_id'] = $treatment->id;
                $t['log_id'] = $log->id;
                $t['tratamiento'] = $treatment->tratamiento;
                $t['tratamiento_nombre'] = $treatment->tratamiento . ' :: Aplicacion Ciclo ' . $log->ciclo;

                $t['pathology_location'] = $treatment->pathology_location->toArray();
                $t['fecha_inicio'] = $treatment->fecha_inicio;
                $t['fecha_fin'] = $treatment->fecha_fin;
                $t['dosis_diaria'] = $treatment->dosis_diaria;
                $t['dosis_total'] = $treatment->dosis_total;
                $t['boost'] = $treatment->boost;
                $t['braquiterapia'] = $treatment->braquiterapia;
                $t['dosis'] = $treatment->dosis;
                $t['frecuencia'] = $treatment->frecuencia;
                $t['observaciones'] = $treatment->observaciones;


                $t['updatedby']['first_name'] = $treatment->updatedby->first_name;
                $t['updatedby']['last_name'] = $treatment->updatedby->last_name;
                $t['updated_at'] = $log->updated_at;

                $t['treatment_fee'] = !is_null( $log->treatment_fee ) ? $log->treatment_fee : $treatment->treatment_fee;
                $t['treatment_billable'] = $treatment->treatment_billable;
                $t['treatment_payed_at']  = !is_null($log->treatment_payed_at) ? \Carbon\Carbon::createFromFormat( 'Y-m-d', $log->treatment_payed_at )->format('d/m/Y') : '';
                $t['treatment_payed'] = !is_null( $log->treatment_payed ) ? $log->treatment_payed : null;

                if( is_null( $treatment->treatment_fee ) && !is_null( $treatment->treatment ) ){

                    $treatment_level = $treatment->treatment->level;
                    $insurance = null;

                    // Get the proper insurance
                    if( !is_null( $treatment->insurance_provider ) ){
                        $insurance = $treatment->insurance_provider;
                    // $row->treatment_fee = $row->insurance_provider->name;
                    } else {
                        $insurance = $item->insurance_providers->first();
                    }

                // If there is an insurance for the patient
                    if( !is_null( $insurance ) && $treatment_level >= 0 ){
                        $method = 'level_' . $treatment_level;
                        $t['treatment_fee'] = $insurance->{$method};
                    }
                }


                $t['plogs'] = PaymentLog::where('item_id', $log->id)
                ->where('item_type', 'treatment' )
                ->orderBy('created_at', 'DESC')
                ->get();

                // dd($t['plogs']);

                $mergeTreatments[] = $t;
            }


        }

        // dd($mergeTreatments);
        // foreach ($treatments as &$row)
        // {
        //     $row->date_type = \Carbon\Carbon::createFromFormat( 'd/m/Y', $row->fecha_inicio )->format('Ymd');
        //     $row->type = 'treatment';
        //     $row->treatment_payed_at  = !is_null($row->treatment_payed_at) ?  \Carbon\Carbon::createFromFormat( 'Y-m-d', $row->treatment_payed_at )->format('d/m/Y') : '';

        //     // set treatment_fee
        //     if( is_null( $row->treatment_fee ) && !is_null( $row->treatment ) ){

        //         $treatment_level = $row->treatment->level;
        //         $insurance = null;

        //         // Get the proper insurance
        //         if( !is_null( $row->insurance_provider ) ){
        //             $insurance = $row->insurance_provider;
        //             // $row->treatment_fee = $row->insurance_provider->name;
        //         } else {
        //             $insurance = $item->insurance_providers->first();
        //         }

        //         // If there is an insurance for the patient
        //         if( !is_null( $insurance ) && $treatment_level >= 0 ){
        //             $method = 'level_' . $treatment_level;
        //             $row->treatment_fee = $insurance->{$method};
        //         }


        //     }

        //     // Add the logs
        //     $row->logs = PaymentLog::where('item_id', $row->id)
        //                                 ->where('item_type', 'treatment' )
        //                                 ->orderBy('created_at', 'DESC')
        //                                 ->get();


        // }

        if( !empty( $mergeTreatments ) )
            $items = $items->merge($mergeTreatments);



        $items = $items->sortByDesc('fecha_inicio');
        // d

        $this->params['items'] = $items->sortByDesc('date_type');

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.pending_payment';

        return view('patients.pending_payment', $this->params);
    }

    public function paymentUpdate($id, Request $request){

        // dd( $request->all() );
        $data = $request->only( ['type', 'treatment_fee', 'treatment_payed', 'treatment_payed_at'] );

        $item = null;
        $log = null;

        if( !isset($data['treatment_payed_at']) || empty($data['treatment_payed_at'] ) )
            $data['treatment_payed_at'] = \Carbon\Carbon::now()->format('Y-m-d') ;
        else
            $data['treatment_payed_at'] = \Carbon\Carbon::createFromFormat( 'd/m/Y', $data['treatment_payed_at'] )->format('Y-m-d');


        if( $data['type'] == 'treatment'){
            $item = PatientTreatment::findOrFail($id);
            $log = TreatmentLog::findOrFail( $request->get('log') );
            $log->treatment_fee = $data['treatment_fee'];
            $log->treatment_payed = $data['treatment_payed'];
            $log->treatment_payed_at = $data['treatment_payed_at'];


            $log->update($data);

        }
        else{
            $item = PatientConsultation::findOrFail($id);
            $item->update($data);
        }



        return redirect()->route('patients.pending_payment.show', [$item->patient_id]);
    }

    public function closure($id)
    {
        $item = Patient::findOrFail($id);

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => $this->routes['show'],
                'route_params' => ['id' => $item->id],
                'title' => $item->first_name . ' ' . $item->last_name
            ]
        );

        array_push(
            $this->params['breadcrumbs'],
            [
                'route' => 'patients.closure.show',
                'route_params' => ['id' => $item->id],
                'title' => 'Cierre'
            ]
        );

        $this->params['item'] = $item;

        $this->params['title'] = $item->first_name . ' ' . $item->last_name;

        $this->params['current_section'] = 'patient.closure';

        return view('patients.closure', $this->params);
    }

    public function closureSave($id, Request $request)
    {
        $item = Patient::findOrFail($id);

        $data = $request->only(['fecha_muerte', 'causa_de_muerte', 'fecha_respuesta_completa']);
        foreach($data as $field => $value)
        {
            if (trim($data[$field]) == '')
            {
                $data[$field] = NULL;
            }
        }

        if ($data['fecha_muerte'] != '')
        {
            $data['fecha_muerte'] = Carbon::createFromFormat('d/m/Y', $data['fecha_muerte'])->format('Y-m-d');
        }

        if ($data['fecha_respuesta_completa'] != '')
        {
            $data['fecha_respuesta_completa'] = Carbon::createFromFormat('d/m/Y', $data['fecha_respuesta_completa'])->format('Y-m-d');
        }

        $item->update($data);

        if (trim($data['fecha_muerte']) != '')
        {
            $item->is_dead = true;
            $item->save();
        }

        return redirect()->route('patients.closure.show', [$item->id]);
    }
}
