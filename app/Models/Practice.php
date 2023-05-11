<?php

namespace App\Models;

use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Practice extends Model
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
        'short_code', 'description', 'level', 'fee', 'is_active', 'deleted_by'
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'short_code', 'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Active scope
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static $levels = [
        0 => 'I',
        1 => 'II',
        2 => 'III',
        3 => 'IV',
        4 => 'V',
        5 => 'VI',
        6 => 'VII'
    ];

}
