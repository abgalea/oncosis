<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Repositories\PatientRepository;


class HomeController extends Controller
{

    private $resourceTitle = 'Reporte Eliminados';
    private $patientRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PatientRepository $patientRepo){
        parent::__construct();

        $this->patientRepository = $patientRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function itemsdeleted() {

        $this->params = [
            'breadcrumbs' => [
                ['route' => 'home', 'title' => 'Inicio'],
                // ['route' => $this->routes['index'], 'title' => $this->resourceTitle]
            ],
            'title' => $this->resourceTitle,
            'items_per_page' => 15
        ];


        // get all patients with deleted items
        $this->params['items'] = $this->patientRepository->deletedItems();

        // dd( $this->params['items'] );

        return view('patients.deleted', $this->params );
    }

    public function restoreConsultation( $id ){
        if( $this->patientRepository->restoreConsultation( $id ) )
            return redirect()->route('itemsdeleted')->withMessages(['type' => 'success', 'text' => 'Consulta restaurada.'] );

        return redirect()->route('itemsdeleted')->withMessages(['type' => 'error', 'text' => 'No se pudo restaurar la consulta. Consulte con el administrador.'] );
    }

    public function restoreTreatment( $id ){
        if( $this->patientRepository->restoreTreatment( $id ) )
            return redirect()->route('itemsdeleted')->withMessages(['type' => 'success', 'text' => 'Tratamiento restaurado.'] );

        return redirect()->route('itemsdeleted')->withMessages(['type' => 'error', 'text' => 'No se pudo restaurar el tratamiento. Consulte con el administrador.'] );
    }
}
