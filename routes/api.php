<?php

use Illuminate\Http\Request;

/*Lista de API's apenas para consulta*/
Route::middleware('Api')->get('/collaborators', 'api\CollaboratorController@index');
Route::middleware('Api')->get('/jobs', 'api\JobController@index');
/************************************/
//users
Route::middleware('Api')->get('/users', 'api\UserController@index');
Route::middleware('Api')->get('/users/email/{email}/password/{password}', 'api\UserController@show');
//clinics
Route::middleware('Api')->get('/clinics', 'api\ClinicController@index');
Route::middleware('Api')->post('/clinics/{id}', 'api\ClinicController@update');
Route::middleware('Api')->delete('/clinics/{id}', 'api\ClinicController@delete');
//clients
Route::middleware('Api')->get('/clients', 'api\ClientController@index');
Route::middleware('Api')->post('/clients', 'api\ClientController@store');
Route::middleware('Api')->post('/clients/{id}', 'api\ClientController@update')->where(['id' => '[0-9]+']);
Route::middleware('Api')->delete('/clients/{id}', 'api\ClientController@delete')->where(['id' => '[0-9]+']);
//appointments
Route::middleware('Api')->get('/appointments/clinic/{clinic_id}', 'api\AppointmentController@showByClinicId')->where(['clinic_id' => '[0-9]+']);
Route::middleware('Api')->get('/appointments/client/{client_id}', 'api\AppointmentController@showByClientId')->where(['client_id' => '[0-9]+']);
Route::middleware('Api')->get('/appointments/collaborator/{collaborator_id}', 'api\AppointmentController@showByCollaboratorId')->where(['collaborator_id' => '[0-9]+']);
Route::middleware('Api')->post('/appointments', 'api\AppointmentController@create');
