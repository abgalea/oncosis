<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::get('/home', function() {
            return redirect('/');
        });


        Route::resource('patient.treatments', 'TreatmentLogsController');
        Route::resource('patient.payments', 'PaymentLogsController');

        Route::resource('payments', 'PaymentsController');
        Route::resource('orders', 'OrdersController');
        Route::resource('treatments', 'TreatmentsController');
        Route::resource('metrics', 'MetricsController');

        Route::post('patients/{patients}/instructions', ['as' => 'patients.instructions.store', 'uses' => 'PatientsController@instructionsUpdate']);

        Route::get('patients/{patients}/background', ['as' => 'patients.background.show', 'uses' => 'PatientsController@background']);
        Route::post('patients/{patients}/background', ['as' => 'patients.background.store', 'uses' => 'PatientsController@backgroundSave']);

        Route::get('patients/{patients}/pathology', ['as' => 'patients.pathology.show', 'uses' => 'PatientsController@pathology']);
        Route::post('patients/{patients}/pathology', ['as' => 'patients.pathology.store', 'uses' => 'PatientsController@pathologySave']);

        Route::get('patients/{patients}/consultation', ['as' => 'patients.consultation.show', 'uses' => 'PatientsController@consultation']);
        Route::post('patients/{patients}/consultation', ['as' => 'patients.consultation.store', 'uses' => 'PatientsController@consultationSave']);
        Route::put('patients/{patients}/consultation', ['as' => 'patients.consultation.update', 'uses' => 'PatientsController@consultationUpdate']);
        Route::delete('patients/{patients}/consultation', ['as' => 'patients.consultation.destroy', 'uses' => 'PatientsController@consultationDestroy']);

        Route::get('patients/{patients}/location', ['as' => 'patients.location.show', 'uses' => 'PatientsController@location']);
        Route::post('patients/{patients}/location', ['as' => 'patients.location.store', 'uses' => 'PatientsController@locationSave']);
        Route::put('patients/{patients}/location', ['as' => 'patients.location.update', 'uses' => 'PatientsController@locationUpdate']);
        Route::delete('patients/{patients}/location', ['as' => 'patients.location.destroy', 'uses' => 'PatientsController@locationDestroy']);

        Route::get('patients/{patients}/physical', ['as' => 'patients.physical.show', 'uses' => 'PatientsController@physical']);
        Route::post('patients/{patients}/physical', ['as' => 'patients.physical.store', 'uses' => 'PatientsController@physicalSave']);
        Route::put('patients/{patients}/physical', ['as' => 'patients.physical.update', 'uses' => 'PatientsController@physicalUpdate']);
        Route::delete('patients/{patients}/physical', ['as' => 'patients.physical.destroy', 'uses' => 'PatientsController@physicalDestroy']);

        Route::get('patients/{patients}/studies', ['as' => 'patients.studies.show', 'uses' => 'PatientsController@studies']);
        Route::post('patients/{patients}/studies', ['as' => 'patients.studies.store', 'uses' => 'PatientsController@studiesSave']);
        Route::put('patients/{patients}/studies', ['as' => 'patients.studies.update', 'uses' => 'PatientsController@studiesUpdate']);
        Route::delete('patients/{patients}/studies', ['as' => 'patients.studies.destroy', 'uses' => 'PatientsController@studiesDestroy']);

        //Route::get('patients/{patients}/treatment-pdf', ['as' => 'patients.treatment.pdf', 'uses' => 'PatientsController@treatmentPdf']);
        Route::post('patients/{patients}/treatment-pdf', ['as' => 'patients.treatment.pdf', 'uses' => 'PatientsController@treatmentPdf']);
        // Route::post('patients/treatment-pdf', ['as' => 'patients.treatment.pdf', 'uses' => 'PatientsController@treatmentPdf']);

        // Route::get('patients/{patients}/treatment-pdf/{treatment}', ['as' => 'patients.treatment-only.pdf', 'uses' => 'PatientsController@treatmentOnlyPdf']);
        Route::post('patients/{patients}/treatment-only-pdf/', ['as' => 'patients.treatment-only.pdf', 'uses' => 'PatientsController@treatmentOnlyPdf']);
        Route::get('patients/{patients}/treatment-pdf-protocol/{treatment}', ['as' => 'patients.treatment-protocol.pdf', 'uses' => 'PatientsController@treatmentProtocolOnlyPdf']);

        Route::get('patients/{patients}/treatment', ['as' => 'patients.treatment.show', 'uses' => 'PatientsController@treatment']);
        Route::post('patients/{patients}/treatment', ['as' => 'patients.treatment.store', 'uses' => 'PatientsController@treatmentSave']);
        Route::put('patients/{patients}/treatment', ['as' => 'patients.treatment.update', 'uses' => 'PatientsController@treatmentUpdate']);
        Route::delete('patients/{patients}/treatment', ['as' => 'patients.treatment.destroy', 'uses' => 'PatientsController@treatmentDestroy']);

        Route::put('patients/{patients}/treatment-status', ['as' => 'patients.treatment.update-status', 'uses' => 'PatientsController@treatmentUpdateStatus']);
        Route::get('patients/{patients}/relapse', ['as' => 'patients.relapse.show', 'uses' => 'PatientsController@relapse']);
        Route::post('patients/{patients}/relapse', ['as' => 'patients.relapse.store', 'uses' => 'PatientsController@relapseSave']);
        Route::post('patients/{patients}/checkin', ['as' => 'patients.checkin.store', 'uses' => 'PatientsController@checkinSave']);

        Route::get('patients/{patients}/pending_payment', ['as' => 'patients.pending_payment.show', 'uses' => 'PatientsController@pendingPayment']);
        Route::put('patients/{patients}/payment', ['as' => 'patients.payment.update', 'uses' => 'PatientsController@paymentUpdate']);
        Route::get('patients/{patients}/payment-pdf', ['as' => 'patients.payment.pdf', 'uses' => 'PatientsController@paymentPdf']);

        Route::get('patients/{patients}/payment-item-pdf/{item}/{type}/{log?}', ['as' => 'patients.payment-item.pdf', 'uses' => 'PatientsController@paymentItemPdf']);

        Route::get('patients/{patients}/closure', ['as' => 'patients.closure.show', 'uses' => 'PatientsController@closure']);
        Route::post('patients/{patients}/closure', ['as' => 'patients.closure.store', 'uses' => 'PatientsController@closureSave']);

        Route::post('patients/history-pdf', ['as' => 'patients.history.pdf', 'uses' => 'PatientsController@historyPdf'] );

        Route::resource('patients', 'PatientsController');
        Route::resource('practices', 'PracticesController');
        Route::resource('pathologies', 'PathologiesController');
        Route::resource('insurance_providers', 'InsuranceProvidersController');
        Route::resource('providers', 'ProvidersController');

        Route::resource('protocols', 'ProtocolsController');

        Route::get('reports', 'ReportsController@index');
        Route::get('reports/patients', 'ReportsController@patients')->name('reports.patients');
        Route::get('reports/economics', 'ReportsController@economics')->name('reports.economics');
        Route::get('reports/excel/economics', 'ReportsController@createEconomicsExcel')->name('reports.excel.economics');

          // Routes allowed for ADMIN
        Route::group( ['middleware' => ['role:admin'] ], function(){


            Route::resource('users', 'UsersController');
            Route::resource('roles', 'RolesController');
            Route::get('borrados', ['as' => 'itemsdeleted', 'uses' => 'HomeController@itemsdeleted']);
            Route::get('borrados/consulta/{id}', ['as' => 'restore.consultation', 'uses' => 'HomeController@restoreConsultation']);
            Route::get('borrados/tratamiento/{id}', ['as' => 'restore.treatment', 'uses' => 'HomeController@restoreTreatment']);
        });

    });
});
