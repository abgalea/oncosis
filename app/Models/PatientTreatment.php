<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientTreatment extends Model
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
        'created_by',
        'updated_by',
        'deleted_by',
        'insurance_provider_id',
        'pathology_location_id',
        'protocol_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'recaida',
        'rc',
        'rp',
        'tratamiento',
        'tipo_tratamiento',
        'ciclos',
        'dosis_diaria',
        'dosis_total',
        'boost',
        'braquiterapia',
        'dosis',
        'frecuencia',
        'instrucciones',
        'observaciones',
        'tratamiento_cobrable',
        'tratamiento_pagada',
        'treatment_id',
        'treatment_fee',
        'treatment_billable',
        'treatment_payed',
        'treatment_payed_at'
    ];

    public function getFechaInicioAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formFechaInicioAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function setFechaInicioAttribute($value)
    {
        if (stristr($value, '/') !== FALSE)
        {
            $this->attributes['fecha_inicio'] = Carbon::createFromFormat('d/m/Y', $value);
        }
        else
        {
            $this->attributes['fecha_inicio'] = $value;
        }
    }

    public function getFechaFinAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formFechaFinAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function setFechaFinAttribute($value)
    {
        if (stristr($value, '/') !== FALSE)
        {
            $this->attributes['fecha_fin'] = Carbon::createFromFormat('d/m/Y', $value);
        }
        else
        {
            $this->attributes['fecha_fin'] = $value;
        }
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'recaida' => 'boolean',
        'braquiterapia' => 'boolean',
        'instrucciones' => 'array',
    ];

    /**
     * A patient treatment belongs to a patient
     * @return
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient')->withTrashed();
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

    /**
     * A patient treatment belongs to an insurance provider
     * @return
     */
    public function insurance_provider()
    {
        return $this->belongsTo('App\Models\InsuranceProvider');
    }

     /**
     * A patient provider belongs to an insurance provider
     * @return
     */
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }

    /**
     * A patient treatment belongs to a pathology location
     * @return
     */
    public function pathology_location()
    {
        return $this->belongsTo('App\Models\PathologyLocation')->withTrashed();
    }

    /**
     * A patient treatment belongs to a protocol
     * @return
     */
    public function protocol()
    {
        return $this->belongsTo('App\Models\Protocol');
    }


    public function treatment()
    {
        return $this->belongsTo('App\Models\Treatment');
    }

    /**
     * A patient treatment has many logs
     * @return
     */
    public function logs()
    {
        return $this->hasMany('App\Models\TreatmentLog');
    }

    /**
     * Active treatments scope
     */
    public function scopeActivo($query)
    {
        return $query->where('estado', 'activo');
    }

    /**
     * Cancelled treatments scope
     */
    public function scopeCancelado($query)
    {
        return $query->where('estado', 'cancelado');
    }

    /**
     * Finished treatments scope
     */
    public function scopeCerrado($query)
    {
        return $query->where('estado', 'cerrado');
    }

    public function deletedby()
    {
        return $this->belongsTo('App\Models\User', 'deleted_by');
    }
}
