<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\PaymentLog;
// use App\Models\PatientConsultation;

use App\Http\Requests;
use Illuminate\Http\Request;

class PaymentLogsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($patient, Request $request)
    {

        // dd( $patient, $request->all() );
        // $item = PatientTreatment::findOrFail($patientTreatment);

        $paymentLog = new PaymentLog;

        $paymentLog->patient_id = $patient;
        $paymentLog->created_by = Auth::user()->id;
        $paymentLog->updated_by = Auth::user()->id;

        $paymentLog->item_id = $request->get('item_id');
        $paymentLog->item_type = $request->get('type');
        $paymentLog->log = $request->get('log');

        $paymentLog->save();

        // $item->logs()->create([
        //     'created_by' => Auth::user()->id,
        //     'updated_by' => Auth::user()->id,
        //     'ciclo' => $request->get('ciclo'),
        //     'toxicidad' => $request->get('toxicidad'),
        //     'tension_arterial' => $request->get('tension_arterial'),
        //     'frecuencia_cardiaca' => $request->get('frecuencia_cardiaca'),
        //     'peso' => $request->get('peso'),
        //     'observaciones' => $request->get('observaciones'),
        //     ]);

        return redirect()->route('patients.pending_payment.show', [$patient])->withMessages(['type' => 'success', 'text' => 'Registro creado exitosamente.']);;
    }


}
