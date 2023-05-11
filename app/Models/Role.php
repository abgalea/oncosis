<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use App\Traits\Models\FilterableModel;

class Role extends EntrustRole
{
    use FilterableModel;

    protected $fillable = [
        'name', 'display_name', 'description'
    ];
    
    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'name',
        'display_name',
        'description'
    ];
}
