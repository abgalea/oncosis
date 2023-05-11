<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'patient_id',
        'created_by',
        'updated_by',
        'item_id',
        'item_type',
        'log'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

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

    public function getFormatedDate(){

        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'UTC');
        $dt->setTimezone('America/Argentina/Buenos_Aires');
        return $dt;
    }
}
