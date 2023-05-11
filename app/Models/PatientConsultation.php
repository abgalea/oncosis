<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientConsultation extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'provider_id',
        'insurance_provider_id',
        'created_by',
        'updated_by',
        'consulta_fecha',
        'recaida',
        'consulta_tipo',
        'consulta_peso',
        'consulta_altura',
        'consulta_superficie_corporal',
        'consulta_presion_arterial',
        'consulta_resumen',
        'consulta_cobrable',
        'consulta_pagada',
        'deleted_by',
        'treatment_id',
        'treatment_fee',
        'treatment_billable',
        'treatment_payed',
        'treatment_payed_at',
        ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'recaida' => 'boolean',
        'consulta_cobrable' => 'boolean',
        'consulta_pagada' => 'boolean',
        'consulta_fecha' => 'date'
    ];

    /**
     * A patient treatment belongs to a patient
     * @return
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    /**
     * A patient pathology belongs to an insurance provider
     * @return
     */
    public function insurance_provider()
    {
        return $this->belongsTo('App\Models\InsuranceProvider');
    }


    /**
     * A patient pathology belongs to an insurance provider
     * @return
     */
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }


    public function treatment()
    {
        return $this->belongsTo('App\Models\Treatment');
    }

    /**
     * A patient pathology was created by an user
     * @return
     */
    public function createdby()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    /**
     * A patient pathology was updated by an user
     * @return
     */
    public function updatedby()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    public function deletedby()
    {
        return $this->belongsTo('App\Models\User', 'deleted_by');
    }
}
