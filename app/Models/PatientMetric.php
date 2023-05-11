<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientMetric extends Model
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
        'metric_id',
        'metric_value',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'metric_value' => 'double'
    ];

    /**
     * A patient metric belongs to a patient
     * @return
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    /**
     * A patient metric belongs to a metric
     * @return
     */
    public function metric()
    {
        return $this->belongsTo('App\Models\Metric');
    }
}
