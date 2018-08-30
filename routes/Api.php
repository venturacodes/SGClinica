<?php

use Illuminate\Http\Request;


//appointments
Route::middleware('Api')->get('/appointments/clinic/{clinic_id}', 'api\AppointmentController@showByClinicId')->where(['clinic_id' => '[0-9]+']);
Route::middleware('Api')->get('/appointments/client/{client_id}', 'api\AppointmentController@showByClientId')->where(['client_id' => '[0-9]+']);
Route::middleware('Api')->get('/appointments/collaborator/{collaborator_id}', 'api\AppointmentController@showByCollaboratorId')->where(['collaborator_id' => '[0-9]+']);
Route::middleware('Api')->post('/appointments', 'api\AppointmentController@create');
Route::middleware('Api')->post('/appointments/web', 'api\AppointmentController@create_for_the_web');
Route::middleware('Api')->post('/appointments/update/{appointment_id}', 'api\AppointmentController@update');
Route::middleware('Api')->post('/appointments/delete/{appointment_id}', 'api\AppointmentController@delete');
