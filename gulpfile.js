var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    mix
        .sass('style.scss')
        .styles([
            '../plugins/select2/select2.min.css',
            '../plugins/select2/select2-bootstrap.min.css',
            '../plugins/sweetalert/sweetalert.css',
            '../plugins/toastr/toastr.min.css',
            '../plugins/switchery/switchery.css',
            '../plugins/datepicker/datepicker3.css',
            '../plugins/form-redactor/redactor.css',
            '../plugins/form-redactor/redactor.krause.css',
            ],
            'public/css/vendor.css')
        .scripts([
            '../plugins/select2/select2.full.min.js',
            '../plugins/sweetalert/sweetalert.min.js',
            '../plugins/toastr/toastr.min.js',
            '../plugins/switchery/switchery.js',
            '../plugins/datepicker/bootstrap-datepicker.js',
            '../plugins/datepicker/bootstrap-datepicker.es.min.js',
            '../plugins/form-redactor/redactor.js',
            '../plugins/form-redactor/krause.js',
            '../plugins/form-redactor/table.js',
            '../plugins/form-redactor/imagemanager.js',
            '../plugins/form-redactor/filemanager.js',
            '../plugins/form-redactor/es_ar.js',
            ],
            'public/js/vendor.js');
});
