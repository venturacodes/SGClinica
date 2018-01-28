<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your API!
|
*/
Route::middleware('Api')->get('/collaborators', 'api\CollaboratorController@index');
Route::middleware('Api')->get('/jobs', 'api\JobController@index');

Route::prefix('users', function () {
    Route::middleware('Api')->get('/', 'api\UserController@index');
    Route::middleware('Api')->get('/email/{email}/password/{password}', 'api\UserController@show');
    Route::middleware('Api')->post('/', 'api\UserController@store');
    Route::middleware('Api')->post('/{id}', 'api\UserController@update')->where(['id' => '[0-9]+']);
    Route::middleware('Api')->delete('/{id}', 'api\UserController@delete')->where(['id' => '[0-9]+']);
});

Route::prefix('clinics', function () {
    Route::middleware('Api')->get('/', 'api\ClinicController@index');
    Route::middleware('Api')->post('/{id}', 'api\ClinicController@update');
    Route::middleware('Api')->delete('/{id}', 'api\ClinicController@delete');
});
Route::prefix('clients', function () {
    Route::middleware('Api')->get('/', 'api\ClientController@index');
    Route::middleware('Api')->post('/', 'api\ClientController@create');
    Route::middleware('Api')->post('/{id}', 'api\ClientController@update')->where(['id' => '[0-9]+']);
    Route::middleware('Api')->delete('/{id}', 'api\ClientController@delete')->where(['id' => '[0-9]+']);
});
Route::prefix('appointments', function () {
    Route::middleware('Api')->get('/clinic/{clinic_id}', 'api\AppointmentController@showByClinicId')->where(['clinic_id' => '[0-9]+']);
    Route::middleware('Api')->get('/client/{client_id}', 'api\AppointmentController@showByClientId')->where(['client_id' => '[0-9]+']);
    Route::middleware('Api')->get('/collaborator/{collaborator_id}', 'api\AppointmentController@showByCollaboratorId')->where(['collaborator_id' => '[0-9]+']);
    Route::middleware('Api')->post('/', 'api\AppointmentController@create');
});
