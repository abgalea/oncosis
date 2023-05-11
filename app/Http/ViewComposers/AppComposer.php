<?php

namespace App\Http\ViewComposers;

use App\Models\Metric;
use Illuminate\Contracts\View\View;

class AppComposer
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
        $view->with('metrics', Metric::active()->orderBy('name')->get());
    }
}
