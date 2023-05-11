<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', 'App\Http\ViewComposers\AppComposer');
        view()->composer('layouts.resource_patient', 'App\Http\ViewComposers\ResourcePatientComposer');
        view()->composer('home', 'App\Http\ViewComposers\HomeComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
