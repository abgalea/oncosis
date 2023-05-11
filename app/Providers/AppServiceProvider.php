<?php

namespace App\Providers;

use Lang;
use URL;
use Form;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register Custom Form Components
    //    URL::forceScheme('https');
//	URL::forceScheme('https');
        Form::component('bsText', 'components.form.text', ['label', 'name', 'value' => NULL, 'attributes' => []]);
        Form::component('bsPassword', 'components.form.password', ['label', 'name', 'value' => NULL, 'attributes' => []]);
        Form::component('bsTextArea', 'components.form.textarea', ['label', 'name' => NULL, 'value', 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['label', 'name', 'value' => NULL, 'attributes' => []]);
        Form::component('bsNumber', 'components.form.number', ['label', 'name', 'value' => NULL, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['label', 'name', 'value' => NULL, 'values' => [], 'attributes' => []]);
        Form::component('bsSelect2', 'components.form.select2', ['label', 'name', 'value' => NULL, 'values' => [], 'attributes' => []]);
        Form::component('bsDate', 'components.form.date', ['label', 'name', 'value' => NULL, 'attributes' => []]);

        // Set Carbon Language to Spanish
        $localeCode = Lang::getLocale();
        Carbon::setLocale($localeCode);
        setlocale(LC_ALL, $localeCode . '_' . strtoupper($localeCode) . '.UTF-8');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if ($this->app->environment() !== 'production') {
        //     $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        // }
    }
}
