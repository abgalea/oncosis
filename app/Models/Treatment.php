<?php

namespace App\Models;

use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
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
        'short_code', 'level', 'type', 'description', 'fee', 'is_active', 'deleted_by'
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
        'is_active' => 'boolean'
    ];

    public static $levels = [
        -1 => 'Ninguno',
        0 => 'I',
        1 => 'II',
        2 => 'III',
        3 => 'IV',
        4 => 'V',
        5 => 'VI',
        6 => 'VII'
    ];

    public static $types = [
        0 => 'Consulta',
        1 => 'Tratamiento'
    ];

    /**
     * Active scope
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
