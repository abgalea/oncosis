<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Payment extends Model
{
    use FilterableModel, FormAccessible;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'insurance_provider_id', 'payment_date', 'payment_month', 'payment_year', 'total', 'notes'
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'payment_date', 'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'payment_date' => 'date'
    ];

    public function formPaymentDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * An order belongs to a provider
     * @return
     */
    public function insurance_provider()
    {
        return $this->belongsTo('App\Models\InsuranceProvider');
    }
}
