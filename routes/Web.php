<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'Web\HomeController@index')->name('home');
Auth::routes();
Route::group(['prefix'=> 'appointments', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@appointment')->name('appointment.show');
    Route::get('/nextAppointments', 'Web\AppointmentController@nextAppointments')->name('appointment.next_appointments');
    Route::post('/search', 'Web\AppointmentController@searchByName')->name('appointment.searchByName');
    Route::post('/create', 'Web\AppointmentController@create')->name('appointment.create');
    Route::get('/{id}/edit', 'Web\AppointmentController@edit')->name('appointment.edit');
    Route::post('/{id}', 'Web\AppointmentController@update')->name('appointment.update');
    Route::get('/{id}/delete', 'Web\AppointmentController@destroy')->name('appointment.delete');
    Route::get('/{id}/attend_to', 'Web\AppointmentController@attendTo')->name('appointment.attend_to');
    Route::get('/{id}/needExams', 'Web\AppointmentController@needExams')->name('appointment.need_exams');
    Route::post('/{id}', 'Web\AppointmentController@store')->name('appointment.store');
    Route::post('/{id}/attachExams', 'Web\AppointmentController@attachExams')->name('appointment.attachExams');
    
});
Route::group(['prefix'=> 'collaborators', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@collaborator')->name('collaborator.index');
    Route::post('/', 'Web\CollaboratorController@store')->name('collaborator.store');
    Route::get('/create', 'Web\CollaboratorController@create')->name('collaborator.create');
    Route::get('/{id}/delete', 'Web\CollaboratorController@destroy')->name('collaborator.delete');
    Route::get('/{id}/edit', 'Web\CollaboratorController@edit')->name('collaborator.edit');
    Route::post('/{id}', 'Web\CollaboratorController@update')->name('collaborator.update');
});
Route::group(['prefix'=> 'clients', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@client')->name('client.index');
    Route::post('/', 'Web\ClientController@store')->name('client.store');
    Route::get('{id}/show', 'Web\ClientController@show')->name('client.show');
    Route::get('/create', 'Web\ClientController@create')->name('client.create');
    Route::get('/{id}/delete', 'Web\ClientController@destroy')->name('client.delete');
    Route::get('/{id}/edit', 'Web\ClientController@edit')->name('client.edit');
    Route::post('/{id}', 'Web\ClientController@update')->name('client.update');
});
Route::group(['prefix'=> 'clinics', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@clinic')->name('clinic.index');
    Route::get('/create', 'Web\ClinicController@create')->name('clinic.create');
    Route::post('/', 'Web\ClinicController@store')->name('clinic.store');
    Route::get('/{id}/delete', 'Web\ClinicController@destroy')->name('clinic.delete');
    Route::get('/{id}/edit', 'Web\ClinicController@edit')->name('clinic.edit');
    Route::post('/{id}', 'Web\ClinicController@update')->name('clinic.update');
});
Route::group(['prefix'=> 'medicines', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@medicine')->name('medicine.index');
    Route::post('/', 'Web\MedicineController@store')->name('medicine.store');
    Route::get('/create', 'Web\MedicineController@create')->name('medicine.create');
    Route::get('/{id}/delete', 'Web\MedicineController@destroy')->name('medicine.delete');
    Route::get('/{id}/edit', 'Web\MedicineController@edit')->name('medicine.edit');
    Route::put('/{id}', 'Web\MedicineController@update')->name('medicine.update');
});
Route::group(['prefix'=> 'receipts', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@receipt')->name('receipt.index');
    Route::post('/', 'Web\ReceiptController@store')->name('receipt.store');
    Route::get('/create', 'Web\ReceiptController@create')->name('receipt.create');
    Route::get('/{id}/delete', 'Web\ReceiptController@destroy')->name('receipt.delete');
    Route::get('/{id}/edit', 'Web\ReceiptController@edit')->name('receipt.edit');
    Route::post('/{id}', 'Web\ReceiptController@update')->name('receipt.update');
});
Route::get('/', 'Web\HomeController@report')->name('report.show');
