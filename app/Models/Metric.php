<?php

namespace App\Models;

use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    use FilterableModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_active'
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
}
