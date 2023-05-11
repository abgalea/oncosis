<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Models\FilterableModel;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Order extends Model
{
    use FilterableModel, FormAccessible;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id', 'practice_id', 'order_date', 'period_month', 'period_year', 'quantity', 'funcion', 'total', 'paid'
    ];

    /**
     * The attributes that can be used to filter
     *
     * @var array
     */
    protected $filterable = [
        'order_date', 'funcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_date' => 'date',
        'paid' => 'boolean'
    ];

    public function formOrderDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Paid scope
     */
    public function scopePaid($query)
    {
        return $query->where('paid', true);
    }

    /**
     * Unpaid scope
     */
    public function scopeUnpaid($query)
    {
        return $query->where('paid', false);
    }

    /**
     * An order belongs to a provider
     * @return
     */
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }

    /**
     * An order belongs to a practice
     * @return
     */
    public function practice()
    {
        return $this->belongsTo('App\Models\Practice');
    }
}
