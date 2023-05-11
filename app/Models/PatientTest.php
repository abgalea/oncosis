<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Spatie\Image\Manipulations;

class PatientTest extends Model implements HasMediaConversions
{
    use FilterableModel;
    use SoftDeletes;
    use HasMediaTrait;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'recaida',
        'rc',
        'rp',
        'ee',
        'progresion',
        'estudio_fecha',
        'estudio_detalle',
        'estudio_laboratorio',
        'pathology_id'
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'estudio_detalle',
        'estudio_laboratorio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'recaida' => 'boolean',
        'estudio_fecha' => 'date'
    ];

    /**
     * A patient test belongs to a patient
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

    public function pathology(){
        return $this->belongsTo('App\Models\Pathology', 'pathology_id');
    }

    /**
     * A patient pathology was updated by an user
     * @return
     */
    public function updatedby()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }


    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 200, 'h' => 200, 'fit' => 'crop' ])
             ->performOnCollections('*');
    }
}
