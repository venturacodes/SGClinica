<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'Web\HomeController@index')->name('home');
Route::get('/download_app', 'Web\HomeController@downloadApp')->name('home.download_app');
Auth::routes();
Route::prefix('appointments')->group(function () {
    Route::get('/', 'Web\HomeController@appointment')->name('appointment.show');
    Route::post('/', 'Web\AppointmentController@create')->name('appointment.create');
});
Route::prefix('collaborators')->group(function () {
    Route::get('/', 'Web\HomeController@collaborator')->name('collaborator.index');
    Route::post('/', 'Web\CollaboratorController@store')->name('collaborator.store');
    Route::get('/create', 'Web\CollaboratorController@create')->name('collaborator.create');
    Route::get('/{id}/delete', 'Web\CollaboratorController@destroy')->name('collaborator.delete');
    Route::get('/{id}/edit', 'Web\CollaboratorController@edit')->name('collaborator.edit');
    Route::post('/{id}', 'Web\CollaboratorController@update')->name('collaborator.update');
});
Route::prefix('clients')->group(function () {
    Route::get('/', 'Web\HomeController@client')->name('client.index');
    Route::post('/', 'Web\ClientController@store')->name('client.store');
    Route::get('/create', 'Web\ClientController@create')->name('client.create');
    Route::get('/{id}/delete', 'Web\ClientController@destroy')->name('client.delete');
    Route::get('/{id}/edit', 'Web\ClientController@edit')->name('client.edit');
    Route::post('/{id}', 'Web\ClientController@update')->name('client.update');
});
Route::prefix('clinics')->group(function () {
    Route::get('/', 'Web\HomeController@clinic')->name('clinic.index');
    Route::get('/create', 'Web\ClinicController@create')->name('clinic.create');
    Route::post('/', 'Web\ClinicController@store')->name('clinic.store');
    Route::get('/{id}/delete', 'Web\ClinicController@destroy')->name('clinic.delete');
    Route::get('/{id}/edit', 'Web\ClinicController@edit')->name('clinic.edit');
    Route::post('/{id}', 'Web\ClinicController@update')->name('clinic.update');
    Route::get('/choose_clinic', 'Web\ClinicController@chooseClinic')->name('clinic.choose_clinic');
});
