<?php

namespace App\Models;

use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
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
        'short_name', 'name', 'is_active', 'deleted_by'
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'short_name', 'name'
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
     * Get the user full name
     *
     * @param  string  $value
     * @return string
     */
    public function getFullNameAttribute()
    {
        return '(' . $this->short_name .  ') ' . $this->name;
    }

    /**
     * A provider has many insurance providers
     * @return
     */
    public function insurance_providers()
    {
        return $this->hasMany('App\Models\InsuranceProvider');
    }
}
