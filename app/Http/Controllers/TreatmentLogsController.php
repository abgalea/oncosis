<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\PatientTreatment;
use App\Http\Requests;
use Illuminate\Http\Request;

class TreatmentLogsController extends Controller
{
    /**
     * Resource Title
     * @var string
     */
    private $resourceTitle = 'Histórico Tratamiento';

    /**
     * Base resource route names
     * @var string
     */
    private $routes = [
        'base' => 'treatment_logs',
        'index' => 'treatment_logs.index',
        'store' => 'treatment_logs.store',
        'create' => 'treatment_logs.create',
        'show' => 'treatment_logs.show',
        'destroy' => 'treatment_logs.destroy',
        'update' => 'treatment_logs.update',
        'edit' => 'treatment_logs.edit'
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($patientTreatment, Request $request)
    {
        $item = PatientTreatment::findOrFail($patientTreatment);

        $item->logs()->create([
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'ciclo' => $request->get('ciclo'),
            'toxicidad' => $request->get('toxicidad'),
            'tension_arterial' => $request->get('tension_arterial'),
            'frecuencia_cardiaca' => $request->get('frecuencia_cardiaca'),
            'peso' => $request->get('peso'),
            'observaciones' => $request->get('observaciones'),
            ]);

        return redirect()->route('patients.treatment.show', [$item->patient_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
