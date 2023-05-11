<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientPhysical extends Model
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
        'fecha_registro',
        'fisico_completo',
        'recaida',
        'fisico_peso',
        'fisico_altura',
        'fisico_superficie_corporal',
        'fisico_ta',
        'fisico_talla',
        'fisico_temperatura',
        'fisico_presion_arterial',
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
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fisico_completo' => 'boolean',
        'recaida' => 'boolean',
        'fecha_registro' => 'date'
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
}
