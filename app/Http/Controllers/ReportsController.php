<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\InsuranceProvider;
use App\Models\Provider;

use App\Models\Patient;

use App\Repositories\PatientRepository;

class ReportsController extends Controller
{
    private $resourceTitle = 'Reportes';
    private $patientRepository;

    private $routes = [
        'patients' => 'reports.patients',
        'economics' => 'reports.economics'
    ];

    public function __construct(PatientRepository $patientRepo){
        parent::__construct();

        $this->patientRepository = $patientRepo;

        $this->params = [
            'routes' => $this->routes,
            'breadcrumbs' => [
                ['route' => 'home', 'title' => 'Inicio'],
                // ['route' => $this->routes['index'], 'title' => $this->resourceTitle]
            ],
            'title' => $this->resourceTitle,
            'items_per_page' => 15
        ];
    }

    public function patients( Request $request ){
        $this->params['current_section'] = 'reports.patients';
        return view( $this->routes['patients'], $this->params );
    }

    public function economics( Request $request ){

        ini_set('memory_limit', '512M');

        $input = $request->all();

        $this->params['filters'] = $input;

        $providers = collect([]); //InsuranceProvider::with('patients')->has('patients')->active()->paginate($this->params['items_per_page']);


        if( !empty( $input ) ){
            $providers = $this->patientRepository->economicsReport($input);
        }
        // $patients = Patient::with('insurance_providers')->where('has_insurance', true)->active()->first();

        // dd( $providers->count() );
        $this->params['institutions'] = Provider::active()->orderBy('name')->lists('name', 'id')->prepend('', '');


        $this->params['insurance_providers'] = InsuranceProvider::orderBy('name')->lists('name', 'id')->prepend('', '');

        // dd($this->params);
        $this->params['current_section'] = 'reports.economics';
        $this->params['providers'] = $providers;
        return view( $this->routes['economics'], $this->params );
    }

    public function createEconomicsExcel( Request $request ){
        ini_set('memory_limit', '512M');

        $input = $request->all();

        $providers = $this->patientRepository->economicsReport($input);

        \Excel::create('Reporte Economico', function($excel) use($providers){
            foreach( $providers as $provider ){
                $excel->sheet($provider['name'], function($sheet) use($provider) {
                    // $sheet->setWidth(array(
                    //         'E'     =>  40,
                    //         'F'     =>  10,
                    //         'G'     =>  10,
                    //         'H'     =>  10,
                    //         'I'     =>  10,
                    //         'J'     =>  10,
                    //         'K'     =>  10,
                    //     ));
                    $sheet->loadView('reports.economics_xls', compact('provider'));
                });
            }

        })->download('xls');
    }
}
