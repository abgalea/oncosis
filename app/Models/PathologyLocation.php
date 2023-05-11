<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class PathologyLocation extends Model implements HasMediaConversions
{

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
        'pathology_id',
        'fecha_diagnostico',
        'tipo',
        'numero',
        'ubicacion',
        'histologia',
        'biopsia',
        'pag',
        'paf',
        'estadio',
        'campo_t',
        'campo_n',
        'campo_m',
        'inmunohistoquimica',
        'receptores_hormonales',
        'estrogeno',
        'biologia_molecular',
        'progesterona',
        'indice_proliferacion',
        'detalles',
        'created_by',
        'updated_by',
        'deleted_by',
        ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'biopsia' => 'boolean',
        'pag' => 'boolean',
        'paf' => 'boolean',
        'fecha_diagnostico' => 'date'
    ];

    public function getFechaDiagnosticoAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function formFechaDiagnosticoAttribute($value)
    {
        return ($value) ? Carbon::parse($value)->format('d/m/Y') : NULL;
    }

    public function setFechaDiagnosticoAttribute($value)
    {
        if (stristr($value, '/') !== FALSE)
        {
            $this->attributes['fecha_diagnostico'] = Carbon::createFromFormat('d/m/Y', $value);
        }
        else
        {
            $this->attributes['fecha_diagnostico'] = $value;
        }
    }

    /**
     * A patient treatment belongs to a patient
     * @return
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    /**
     * A patient pathology belongs to a pathology
     * @return
     */
    public function pathology()
    {
        return $this->belongsTo('App\Models\Pathology')->withTrashed();;
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

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 200, 'h' => 200, 'fit' => 'crop' ])
             ->performOnCollections('*');
    }
}
