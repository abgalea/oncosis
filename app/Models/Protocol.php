<?php

namespace App\Models;

use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Protocol extends Model
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
        'name', 'instructions', 'is_active', 'deleted_by'
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

    public function instructionsForm()
    {
        return str_replace('{{campo}}', '<input name="instructions[]" class="form-control" value="" />', $this->instructions);
    }
}
