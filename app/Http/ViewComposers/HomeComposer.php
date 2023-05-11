<?php

namespace App\Http\ViewComposers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Patient;
use App\Models\PatientTreatment;
use Illuminate\Contracts\View\View;

class HomeComposer
{
    /**
     * Create a new sidebar composer.
     *
     * @param  AuthManager $auth
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     **/
    public function compose(View $view)
    {
        $view->with('total_payments', Payment::where('payment_year', date('Y'))->where('payment_month', date('n'))->sum('total'));
        $view->with('total_paid_orders', Order::paid()->where('period_year', date('Y'))->where('period_month', date('n'))->sum('total'));
        $view->with('total_unpaid_orders', Order::unpaid()->where('period_year', date('Y'))->where('period_month', date('n'))->sum('total'));
        $view->with('recent_patients', Patient::active()->latest()->paginate(10));
        $view->with('recent_treatments', PatientTreatment::with(['patient'])->activo()->latest()->paginate(10));
        $view->with('finished_treatments', PatientTreatment::with(['patient'])->cerrado()->latest()->paginate(10));
        $view->with('patient_age_distribution', (new Patient)->ageDistribution());
    }
}
