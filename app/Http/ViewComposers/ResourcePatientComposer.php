<?php

namespace App\Http\ViewComposers;

use App\Models\Protocol;
use App\Models\Treatment;
use App\Models\InsuranceProvider;
use Illuminate\Contracts\View\View;

class ResourcePatientComposer
{
    /**
     * Create a new sidebar composer.
     *
     * @param  AuthManager $auth
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     **/
    public function compose(View $view)
    {


        $tratamientos = [
            'QUIMIOTERAPIA' => 'Quimioterapia IV',
            'RADIOTERAPIA' => 'Radioterapia',
            'DROGAS TARGET' => 'Drogas Target VI',
            'INMUNOTERAPIA' => 'Inmunoterapia V',
            'HORMONOTERAPIA' => 'Hormonoterapia',
            'PALIATIVO' => 'Paliativo',
            'CIRUGIA' => 'Cirugía',
        ];

        $protocolos = [];
        $protocols = (new Protocol)->active()->get();
        if (count($protocols) > 0)
        {
            foreach($protocols as $protocol)
            {
                $protocolos[$protocol->id] = [
                    'id' => $protocol->id,
                    'name' => $protocol->name,
                    'instructions' => $protocol->instructionsForm(),
                ];
            }
        }

        // Localizacion / Patologia del Paciente
        $localizacion_patologias = [];
        if (isset($view->item))
        {
            if (count($view->item->pathologies) > 0)
            {
                foreach($view->item->pathologies as $pathology)
                {
                    $localizacion_patologias[$pathology->id] = $pathology->pathology->name . ' - ' . $pathology->tipo;
                }
            }
        }

        // dd( $localizacion_patologias );

        $view->with('consultations', (new Treatment)->where('type',0)->lists('description', 'id'));
        $view->with('localizacion_patologias', $localizacion_patologias);
        $view->with('insurance_providers', (new InsuranceProvider)->active()->orderBy('name')->lists('name', 'id'));
        $view->with('treatments', (new Treatment)->where('type',1)->lists('description', 'id'));
        $view->with('tratamientos', $tratamientos);
        $view->with('protocols', (new Protocol)->where('id', '<>', 0)->lists('name', 'id'));
        $view->with('protocols_json', collect($protocolos));
    }
}
