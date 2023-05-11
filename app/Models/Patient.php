<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use FormAccessible;
    use SoftDeletes;

    public static $sexValues = [
        'masculino' => 'Masculino',
        'femenino' => 'Femenino'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'id_number',
        'date_of_birth',
        'sex',
        'insurance_id',
        'address',
        'city',
        'state',
        'country',
        'phone_number',
        'occupation',
        'is_active',
        'is_dead',
        'has_weight_warning',
        'has_insurance',

        // Antecedentes
        'antecedente_cantidad_tabaco',
        'antecedente_tiempo_tabaco',
        'antecedente_fumador_pasivo',
        'antecedente_cantidad_alcohol',
        'antecedente_tiempo_alcohol',
        'antecedente_drogas',
        'antecedente_menarca',
        'antecedente_menospau',
        'antecedente_aborto',
        'antecedente_embarazo',
        'antecedente_parto',
        'antecedente_lactancia',
        'antecedente_anticonceptivos',
        'antecedente_anticonceptivos_aplicacion',
        'antecedente_quirurgicos',
        'antecedente_familiar_oncologico',

        // Patología
        'patologia_alergia',
        'patologia_alergia_tipo',
        'patologia_neurologico',
        'patologia_osteo_articular',
        'patologia_cardiovascular',
        'patologia_locomotor',
        'patologia_infectologia',
        'patologia_endocrinologico',
        'patologia_urologico',
        'patologia_oncologico',
        'patologia_oncologico_tipo',
        'patologia_neumonologico',
        'patologia_ginecologico',
        'patologia_metabolico',
        'patologia_gastrointestinal',
        'patologia_colagenopatia',
        'patologia_hematologico',
        'patologia_concomitante',
        'patologia_otros',

        // Localizacion
        'fecha_diagnostico',
        'fecha_muerte',
        'fecha_recaida',
        'fecha_respuesta_completa',
        'respuesta_parcial',
        'progresion',
        'causa_de_muerte',

        // Físico
        'fisico_performance',
        'fisico_ta',
        'fisico_temp',
        'fisico_talla',
        'fisico_cabeza',
        'fisico_cuello',
        'fisico_torax',
        'fisico_abdomen',
        'fisico_urogenital',
        'fisico_tacto_rectal',
        'fisico_tacto_vaginal',
        'fisico_mama',
        'fisico_neurologico',
        'fisico_locomotor',
        'fisico_linfogangliar',
        'fisico_tcs',
        'fisico_piel',

        // Recaida
        'recaida_fecha',
        'recaida_sintoma',
        'recaida_examen_fisico',

        // Migración c_cod
        'c_cod',

        'deleted_by'
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'id',
        'first_name',
        'last_name',
        // 'id_number',
        // 'date_of_birth',
        // 'insurance_id',
        // 'address',
        // 'city',
        // 'state',
        // 'country',
        // 'phone_number',
        // 'occupation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_dead' => 'boolean',
        'has_weight_warning' => 'boolean',
        'has_insurance' => 'boolean',
        'antecedente_fumador_pasivo' => 'boolean',
        // 'antecedente_drogas' => 'boolean',
        // 'antecedente_menarca' => 'boolean',
        // 'antecedente_menospau' => 'boolean',
        // 'antecedente_aborto' => 'boolean',
        // 'antecedente_embarazo' => 'boolean',
        // 'antecedente_parto' => 'boolean',
        'antecedente_lactancia' => 'boolean',
        // 'antecedente_anticonceptivos' => 'boolean',
        'fecha_diagnostico' => 'date',
        'fecha_muerte' => 'date',
        'fecha_recaida' => 'date',
        'fecha_respuesta_completa' => 'date',
        'recaida_fecha' => 'date'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'age',
        'first_consultation',
        'last_consultation'
    ];

    public function getAgeAttribute()
    {
        return ($this->getOriginal('date_of_birth') AND $this->getOriginal('date_of_birth') != '0000-00-00') ? Carbon::parse($this->getOriginal('date_of_birth'))->diffInYears() : NULL;
    }

    public function getFirstConsultationAttribute()
    {
        $firstConsultation = $this->consultations()->orderBy('consulta_fecha')->first();
        if ($firstConsultation)
        {
            return $firstConsultation->consulta_fecha->format('d/m/Y');
        }
        else
        {
            return NULL;
        }
    }

    public function getLastConsultationAttribute() {
        $consultation = $this->consultations()->orderBy('consulta_fecha', 'DESC')->first();
        if ($consultation)
        {
            return $consultation;
        }
        else
        {
            return NULL;
        }
    }

    public function getDateOfBirthAttribute($value)
    {
        return ($value AND $value != '0000-00-00') ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function getFechaDiagnosticoAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function getFechaMuerteAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function getFechaRecaidaAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function getFechaRespuestaCompletaAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function getRecaidaFechaAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formDateOfBirthAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formFechaDiagnosticoAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formFechaMuerteAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formFechaRecaidaAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formFechaRespuestaCompletaAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formRecaidaFechaAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function getPaymentsBill(){
        $amount = 0;

        $items = collect([]);

        // Consultations
        $consultations = PatientConsultation::with(['insurance_provider', 'provider', 'updatedby'])
                                            ->where('patient_id', $this->id)
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
                    $insurance = $this->insurance_providers->first();
                }

                // If there is an insurance for the patient
                if( !is_null( $insurance ) && $treatment_level >= 0 ){
                    $method = 'level_' . $treatment_level;
                    $row->treatment_fee = $insurance->{$method};
                }


            }

            // Add the logs
            // $row->logs = PaymentLog::where('item_id', $row->id)
            //                             ->where('item_type', 'consultation' )
            //                             ->orderBy('created_at', 'DESC')
            //                             ->get();
        }
        $items = $items->merge($consultations->toArray());

        // Treatments
        $treatments = PatientTreatment::with(['treatment', 'pathology_location', 'pathology_location.pathology', 'updatedby'])
                                      ->where('patient_id', $this->id)
                                      ->where('tratamiento_pagado', false)
                                      ->orderBy('fecha_inicio', 'desc')
                                      ->orderBy('id', 'DESC')
                                      ->get();

        // dd($treatments);

        foreach ($treatments as &$row)
        {
            $row->date_type = \Carbon\Carbon::createFromFormat( 'd/m/Y', $row->fecha_inicio )->format('Ymd');
            $row->type = 'treatment';
            $row->treatment_payed_at  = !is_null($row->treatment_payed_at) ?  \Carbon\Carbon::createFromFormat( 'Y-m-d', $row->treatment_payed_at )->format('d/m/Y') : '';

            // set treatment_fee

            if( is_null( $row->treatment_fee ) && !is_null( $row->treatment ) ){
                // \Log::info('#'.$this->id, ['data' => $row->treatment]);
                $treatment_level = $row->treatment->level;
                $insurance = null;

                // Get the proper insurance
                if( !is_null( $row->insurance_provider ) ){
                    $insurance = $row->insurance_provider;
                    // $row->treatment_fee = $row->insurance_provider->name;
                } else {
                    $insurance = $this->insurance_providers->first();
                }

                // If there is an insurance for the patient
                if( !is_null( $insurance ) && $treatment_level >= 0 ){
                    $method = 'level_' . $treatment_level;
                    $row->treatment_fee = $insurance->{$method};
                }


            }

            // Add the logs
            // $row->logs = PaymentLog::where('item_id', $row->id)
            //                             ->where('item_type', 'treatment' )
            //                             ->orderBy('created_at', 'DESC')
            //                             ->get();


        }


        $items = $items->merge($treatments->toArray());

        $amount = $items->sum('treatment_fee');

        return '$ '.number_format($amount, 0, '', '.');
    }

    /**
     * Active patients
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * A patient belongs to one or more insurance providers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function insurance_providers()
    {
        return $this->belongsToMany('App\Models\InsuranceProvider', 'insurance_provider_patient', 'patient_id', 'insurance_provider_id');
    }

    /**
     * A patient has many tests
     * @return
     */
    public function tests()
    {
        return $this->hasMany('App\Models\PatientTest');
    }

    /**
     * A patient has many treatments
     * @return
     */
    public function treatments()
    {
        return $this->hasMany('App\Models\PatientTreatment');
    }

    /**
     * A patient has many pathologies
     * @return
     */
    public function pathologies()
    {
        return $this->hasMany('App\Models\PathologyLocation');
    }

    /**
     * A patient has many physical
     * @return
     */
    public function physicals()
    {
        return $this->hasMany('App\Models\PatientPhysical');
    }

    /**
     * A patient has many consultations
     * @return
     */
    public function consultations()
    {
        return $this->hasMany('App\Models\PatientConsultation');
    }

    /**
     * A patient has many metrics
     * @return
     */
    public function metrics()
    {
        return $this->hasMany('App\Models\PatientMetric');
    }

    public function ageDistribution()
    {
        $query = DB::table('patients')
            ->selectRaw('DATE_FORMAT(FROM_DAYS(DATEDIFF(current_date, date_of_birth)), \'%Y\') + 0 AS age, COUNT(*) AS total')
            ->whereRaw('DATE_FORMAT(FROM_DAYS(DATEDIFF(current_date, date_of_birth)), \'%Y\') + 0 IS NOT NULL')
            ->groupBy(DB::Raw('DATE_FORMAT(FROM_DAYS(DATEDIFF(current_date, date_of_birth)), \'%Y\') + 0'))
            ->orderByRaw('DATE_FORMAT(FROM_DAYS(DATEDIFF(current_date, date_of_birth)), \'%Y\') + 0');

        $results = $query->get();
        if (count($results) > 0)
        {
            $data = $labels = [];

            $i = 0;
            foreach($results as $row)
            {
                $data[] = [$i, (int)$row->total];
                $labels[] = [$i, (int)$row->age];
                $i++;
            }

            return [
                'data' => $data,
                'labels' => $labels
                ];
        }
        else
        {
            return [
                'data' => [],
                'labels' => []
                ];
        }
    }

    public function scopeFilteredPaginate($query, $filters = [], $count = 10)
    {
        $filter_patient_id = $filter_firstname = $filter_lastname = $filter_insurance = $filter_pathology ='';

        if (isset($filters[0]))
        {
            $filter_patient_id = trim($filters[0]);
        }

        if (isset($filters[1]))
        {
            $filter_firstname = trim($filters[1]);
        }

        if (isset($filters[2]))
        {
            $filter_lastname = trim($filters[2]);
        }

        if (isset($filters[3]))
        {
            $filter_insurance = trim($filters[3]);
        }

        if (isset($filters[4]))
        {
            $filter_pathology = trim($filters[4]);
        }

        if ( ! is_null($filter_patient_id) AND trim($filter_patient_id) != '')
        {
            $query->orWhere('id', '=', trim($filter_patient_id) );
        }

        if ( ! is_null($filter_firstname) AND trim($filter_firstname) != '')
        {
            $query->orWhereRaw('lower(patients.first_name) like ?', [ '%'.trim(strtolower($filter_firstname)).'%'] ) ;
        }

        if ( ! is_null($filter_lastname) AND trim($filter_lastname) != '')
        {
            $query->orWhereRaw('lower(patients.last_name) like ?', [ '%'.trim(strtolower($filter_lastname)).'%'] ) ;
        }

        if ( ! is_null($filter_insurance) AND trim($filter_insurance) != '')
        {
            $query->join('insurance_provider_patient', 'patients.id', '=', 'insurance_provider_patient.patient_id');
            $query->orWhere('insurance_provider_patient.insurance_provider_id', '=', trim($filter_insurance) );
        }

        if ( ! is_null($filter_pathology) AND trim($filter_pathology) != '')
        {
            $query->join('pathology_locations', 'patients.id', '=', 'pathology_locations.patient_id');
            $query->orWhere('pathology_locations.pathology_id', '=', trim($filter_pathology) );
        }

        // $build = str_replace(array('?'), array('\'%s\''), $query->toSql());
        // $build = vsprintf($build, $query->getBindings());
        // dump($build);

        return $query->paginate($count);
    }
}
