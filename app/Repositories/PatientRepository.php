<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\InsuranceProvider;
use App\Models\Treatment;
use App\Models\PatientConsultation;
use App\Models\PatientTreatment;
use Carbon\Carbon;

class PatientRepository {

    public function economicsReport( $input ) {

        $result = collect([]);

        // if there are selected insurance, bring only active insurance
        $providers = InsuranceProvider::with('patients')->has('patients');

        if( isset( $input['insurance_id']) && !empty( $input['insurance_id'] ) )
            $providers->where('insurance_providers.id', $input['insurance_id']);

        $providers = $providers->get();

        foreach($providers as $provider ){
            // declare the insurance
            $insurance = array(
                'id' => $provider->id,
                'name' => $provider->name,
                'count' => $provider->patients->count(),
                "level_0" => $provider->level_0,
                "level_1" => $provider->level_1,
                "level_2" => $provider->level_2,
                "level_3" => $provider->level_3,
                "level_4" => $provider->level_4,
                "level_5" => $provider->level_5,
                "level_6" => $provider->level_6,
                "dates" => null,
                'patients' => array(),
            );

            if( !empty( $input['start_date']) && !empty( $input['end_date']) && ( $input['start_date'] != $input['end_date'] ) ){
                // Convert timezone to Buenos Aires
                    $sd = \Carbon\Carbon::createFromFormat('d/m/Y', $input['start_date'], 'America/Argentina/Buenos_Aires');
                    $insurance['dates']['sd'] = $sd->format('Y-m-d');
                    $insurance['dates']['sd'] .= ' 00:00';

                    // Convert timezone to Buenos Aires
                    $ed = \Carbon\Carbon::createFromFormat('d/m/Y', $input['end_date'], 'America/Argentina/Buenos_Aires');
                    $insurance['dates']['ed'] = $ed->format('Y-m-d');
                    $insurance['dates']['ed'] .= ' 23:59';
            }

            foreach( $provider->patients as $patient ){

                // $pt = array(
                //     'id' => $patient->id,
                //     'first_name' => $patient->first_name,
                //     'last_name' => $patient->last_name,
                //     'age' => $patient->getAgeAttribute(),
                //     'amount' => 0,
                // );

                $items = collect([]);

                // Consultations
                $consultations = PatientConsultation::where('patient_id', $patient->id)
                ->whereNull('treatment_payed')
                ->orderBy('id', 'DESC');

                if( isset($input['provider_id']) && !empty($input['provider_id']))
                    $consultations->where('provider_id', $input['provider_id']);

                if( !empty( $input['start_date']) && !empty( $input['end_date']) && ( $input['start_date'] != $input['end_date'] ) ){
                    // Convert timezone to Buenos Aires
                    $sd = \Carbon\Carbon::createFromFormat('d/m/Y', $input['start_date'], 'America/Argentina/Buenos_Aires');
                    $start_date = $sd->format('Y-m-d');

                    // Convert timezone to Buenos Aires
                    $ed = \Carbon\Carbon::createFromFormat('d/m/Y', $input['end_date'], 'America/Argentina/Buenos_Aires');
                    $end_date = $ed->format('Y-m-d');

                    $consultations->whereBetween(  \DB::raw('(DATE_FORMAT(patient_consultations.consulta_fecha, "%Y-%m-%d"))'), [$start_date, $end_date] );

                } elseif( !empty( $input['start_date']) && !empty( $input['end_date']) && ( $input['start_date'] == $input['end_date'] ) ){
                    // Convert timezone to Buenos Aires
                    $sd = \Carbon\Carbon::createFromFormat('d/m/Y', $input['start_date'], 'America/Argentina/Buenos_Aires');
                    $start_date = $sd->format('Y-m-d');


                    $consultations->where(  \DB::raw('(DATE_FORMAT(patient_consultations.consulta_fecha, "%Y-%m-%d"))'), [$start_date] );

                }

                $consultations = $consultations->get();

                // Iterate each Consultation
                foreach( $consultations as &$row){
                    $row->type = 'consultation';
                    $row->treatment_level = $row->treatment->level;

                    // set treatment_fee
                    if( is_null( $row->treatment_fee ) ){

                        $treatment_level = $row->treatment->level;

                        // dd( $insurance);

                        // If there is an insurance for the patient
                        if( !is_null( $provider ) && $treatment_level >= 0 ){
                            $method = 'level_' . $treatment_level;
                            $row->treatment_fee = $provider->{$method};
                        }
                    }
                }

                $items = $items->merge($consultations->toArray());
                //
                $treatments = PatientTreatment::with(['treatment', 'logs'])
                ->where('patient_id', $patient->id)
                ->whereNull('treatment_payed')
                ->orderBy('id', 'DESC');

                if( isset($input['provider_id']) && !empty($input['provider_id']))
                    $treatments->where('provider_id', $input['provider_id']);

                if( !empty( $input['start_date']) && !empty( $input['end_date']) && ( $input['start_date'] != $input['end_date'] ) ){
                    // Convert timezone to Buenos Aires
                    $sd = \Carbon\Carbon::createFromFormat('d/m/Y', $input['start_date'], 'America/Argentina/Buenos_Aires');
                    $start_date = $sd->format('Y-m-d');

                    // Convert timezone to Buenos Aires
                    $ed = \Carbon\Carbon::createFromFormat('d/m/Y', $input['end_date'], 'America/Argentina/Buenos_Aires');
                    $end_date = $ed->format('Y-m-d');

                    $treatments->whereBetween(  \DB::raw('(DATE_FORMAT(patient_treatments.fecha_inicio, "%Y-%m-%d"))'), [$start_date, $end_date] );

                } elseif( !empty( $input['start_date']) && !empty( $input['end_date']) && ( $input['start_date'] == $input['end_date'] ) ){
                    // Convert timezone to Buenos Aires
                    $sd = \Carbon\Carbon::createFromFormat('d/m/Y', $input['start_date'], 'America/Argentina/Buenos_Aires');
                    $start_date = $sd->format('Y-m-d');


                    $treatments->where(  \DB::raw('(DATE_FORMAT(patient_treatments.fecha_inicio, "%Y-%m-%d"))'), [$start_date] );

                }

                $treatments = $treatments->get();

                /**
                 * TO DO: Aca se deberia realizar lo mismo que en pending payments
                 * PatientController.php:2478
                 */

                foreach ($treatments as &$row) {
                    $row->type = 'treatment';


                    if( is_null( $row->treatment_fee ) && !is_null( $row->treatment ) ){
                        $row->treatment_level = $row->treatment->level;

                        $treatment_level = $row->treatment->level;
                        if( !is_null( $provider ) && $treatment_level >= 0 ){
                            $method = 'level_' . $treatment_level;
                            $row->treatment_fee = $provider->{$method};
                        }
                    }
                }


                $items = $items->merge($treatments->toArray());

                // //Parse to ITEMS;
                if( !$items->isEmpty() ){

                    $pt = array(
                        'id' => $patient->id,
                        'first_name' => $patient->first_name,
                        'last_name' => $patient->last_name,
                        'age' => $patient->getAgeAttribute(),
                        'items' => $items->count(),
                        'levels' => array(
                            0 => '',
                            1 => '',
                            2 => '',
                            3 => '',
                            4 => '',
                            5 => '',
                            6 => ''
                        ),
                        'amount' => $items->sum('treatment_fee'),
                    );

                    foreach( $items->groupBy('treatment_level')->toArray() as $key => $value ){
                        $pt['levels'][$key] = count($value);
                    }

                    $insurance['patients'][] = $pt; //->toArray();
                }
            }

            // \Log::info('['.$insurance['name'] .'] :: Pacientes ' . count( $insurance['patients'] ) );

            if( count( $insurance['patients'] ) > 0 )
                $result->push($insurance);

            // $result->push(['patients' => $patients]);
        }
        //
        // dd( $result );
        return $result;
    }


    public function deletedItems() {
        // $patients = Patient::with(['treatments'])
        //                     ->join('patient_treatments', 'patients.id', '=', 'patient_treatments.patient_id')
        //                     ->onlyTrashed()
        //                     ->groupBy('patients.id')
        //                     ->get();

        $items = collect([]);

        $treatments = PatientTreatment::onlyTrashed()->get();

        if( !is_null( $treatments ) )
            $items->push( ['treatments' => $treatments ]);

        $consultations = PatientConsultation::onlyTrashed()->get();
        if( !is_null( $consultations ) )
            $items->push( ['consultations' => $consultations ]);

        return $items;
    }


    public function restoreConsultation( $id ){
        $consultation = PatientConsultation::where( 'id', $id )->onlyTrashed()->first();
        $consultation->deleted_by = null;
        $consultation->deleted_at = null;
        if( $consultation->save() )
            return true;

        return false;

    }


    public function restoreTreatment( $id ){
        $treatment = PatientTreatment::where( 'id', $id )->onlyTrashed()->first();
        $treatment->deleted_by = null;
        $treatment->deleted_at = null;
        if( $treatment->save() )
            return true;

        return false;

    }

    public function model(){
        return Patient::class;
    }
}
