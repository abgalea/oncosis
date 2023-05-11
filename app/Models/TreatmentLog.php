<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TreatmentLog extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_treatment_id',
        'created_by',
        'updated_by',
        'ciclo',
        'toxicidad',
        'tension_arterial',
        'frecuencia_cardiaca',
        'peso',
        'observaciones',
        'treatment_fee',
        'treatment_payed',
        'treatment_payed_at',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * A patient treatment belongs to a patient
     * @return
     */
    public function patient_treatment()
    {
        return $this->belongsTo('App\Models\PatientTreatment');
    }

    /**
     * A patient pathology was created by an user
     * @return
     */
    public function createdby()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function getFormatedDate(){

        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'UTC');
        $dt->setTimezone('America/Argentina/Buenos_Aires');
        return $dt;
    }

    /**
     * A patient pathology was updated by an user
     * @return
     */
    public function updatedby()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }
}
