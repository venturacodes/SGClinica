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

Route::middleware('Api')->get('/users', 'api\UserController@index');
Route::middleware('Api')->get('/users/email/{email}/password/{password}', 'api\UserController@show');
Route::middleware('Api')->post('/users', 'api\UserController@store');
Route::middleware('Api')->post('/users/{id}','api\UserController@update')->where(['id' => '[0-9]+']);
Route::middleware('Api')->delete('/users/{id}','api\UserController@delete')->where(['id' => '[0-9]+']);

Route::middleware('Api')->get('/clinic', 'api\ClinicController@index');
Route::middleware('Api')->post('/clinic/{id}', 'api\ClinicController@update');
Route::middleware('Api')->delete('/clinic{id}', 'api\ClinicController@delete');

Route::middleware('Api')->get('/clients', 'api\ClientController@index');
Route::middleware('Api')->post('/clients', 'api\ClientController@create');
Route::middleware('Api')->post('/clients/{id}', 'api\ClientController@update')->where(['id' => '[0-9]+']);
Route::middleware('Api')->delete('/clients/{id}', 'api\ClientController@delete')->where(['id' => '[0-9]+']);

Route::middleware('Api')->get('/collaborators', 'api\CollaboratorController@index');
Route::middleware('Api')->post('/collaborators', 'api\CollaboratorController@store');
Route::middleware('Api')->post('/collaborators/{id}', 'api\CollaboratorController@update')->where(['id' => '[0-9]+']);
Route::middleware('Api')->delete('/collaborators/{id}', 'api\CollaboratorController@delete')->where(['id' => '[0-9]+']);

Route::middleware('Api')->get('/jobs', 'api\JobController@index');
Route::middleware('Api')->post('/jobs', 'api\JobController@create');
Route::middleware('Api')->post('/jobs/{id}', 'api\JobController@update')->where(['id' => '[0-9]+']);
Route::middleware('Api')->delete('/jobs/{id}', 'api\JobController@delete')->where(['id' => '[0-9]+']);

Route::middleware('Api')->get('/appointments/clinic/{clinic_id}', 'api\AppointmentController@showByClinicId')->where(['clinic_id' => '[0-9]+']);
Route::middleware('Api')->get('/appointments/client/{client_id}', 'api\AppointmentController@showByClientId')->where(['client_id' => '[0-9]+']);
Route::middleware('Api')->get('/appointments/collaborator/{collaborator_id}', 'api\AppointmentController@showByCollaboratorId')->where(['collaborator_id' => '[0-9]+']);

Route::middleware('Api')->post('/appointments/create', 'api\AppointmentController@create');
