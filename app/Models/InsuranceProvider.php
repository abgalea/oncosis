<?php

namespace App\Models;

use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceProvider extends Model
{
    use FilterableModel;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id', 'name', 'percentage', 'level_0', 'level_1', 'level_2', 'level_3', 'level_4', 'level_5', 'level_6', 'is_active', 'deleted_by'
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Active scope
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * An insurance provider belongs to a provider
     * @return
     */
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }

    /**
     * An insurance provider belongs to many patients
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function patients()
    {
        return $this->belongsToMany('App\Models\Patient');
    }
}
