<?php

namespace App\Models;

use App\Traits\Models\FilterableModel;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use EntrustUserTrait, FilterableModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'is_active',
        'position'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'first_name',
        'last_name',
        'username',
        'email'
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
     * Get the user full name
     *
     * @param  string  $value
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name .  ' ' . $this->last_name;
    }
}
