<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'Web\HomeController@index')->name('home');
Auth::routes();
Route::group(['prefix'=> 'appointments', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@appointment')->name('appointment.agenda');
    Route::get('/nextAppointments', 'Web\AppointmentController@nextAppointments')->name('appointment.next_appointments');
    Route::post('/search', 'Web\AppointmentController@searchByName')->name('appointment.searchByName');
    Route::post('/create', 'Web\AppointmentController@create')->name('appointment.create');
    Route::get('/{id}/edit', 'Web\AppointmentController@edit')->name('appointment.edit');
    Route::post('/{id}', 'Web\AppointmentController@update')->name('appointment.update');
    Route::get('/{appointment}', 'Web\AppointmentController@show')->name('appointment.show');
    Route::get('/{id}/delete', 'Web\AppointmentController@destroy')->name('appointment.delete');
    Route::get('/{appointment}/attendTo', 'Web\AppointmentController@attendTo')->name('appointment.attendTo');
    Route::get('/{appointment}/needExams', 'Web\AppointmentController@needExams')->name('appointment.needExams');
    Route::post('/{appointment}/add_description', 'Web\AppointmentController@addDescription')->name('appointment.add_description');
    Route::get('/{appointment}/attachExam', 'Web\AppointmentController@attachExam')->name('appointment.attachExam');
    Route::get('/{appointment}/{exam}/delete', 'Web\AppointmentController@destroyExam')->name('appointment.deleteExam');
    Route::post('/{appointment}/storeExam', 'Web\AppointmentController@storeExam')->name('appointment.storeExam');
    
    Route::get('/{appointment}/needReceipts', 'Web\AppointmentController@needReceipts')->name('appointment.needReceipt');
    Route::get('/{appointment}/attachReceipt', 'Web\AppointmentController@attachReceipt')->name('appointment.attachReceipt');
    Route::get('/{appointment}/{receipt}/deleteReceipt', 'Web\AppointmentController@destroyReceipt')->name('appointment.deleteReceipt');
    Route::post('/{appointment}/storeReceipt', 'Web\AppointmentController@storeReceipt')->name('appointment.storeReceipt');
    Route::get('/{appointment}/{receipt}/showReceipt', 'Web\AppointmentController@showReceipt')->name('appointment.showReceipt');
    Route::post('/{appointment}/endAppointment', 'Web\AppointmentController@endAppointment')->name('appointment.endAppointment');

});
Route::group(['prefix'=> 'collaborators', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@collaborator')->name('collaborator.index');
    Route::post('/store', 'Web\CollaboratorController@store')->name('collaborator.store');
    Route::get('/create', 'Web\CollaboratorController@create')->name('collaborator.create');
    Route::get('/{collaborator}/delete', 'Web\CollaboratorController@destroy')->name('collaborator.delete');
    Route::get('/{collaborator}/edit', 'Web\CollaboratorController@edit')->name('collaborator.edit');
    Route::put('/{collaborator}', 'Web\CollaboratorController@update')->name('collaborator.update');
    Route::post('/search', 'Web\CollaboratorController@searchByName')->name('collaborator.searchByName');
    Route::get('/search', 'Web\CollaboratorController@searchByName');
});
Route::group(['prefix'=> 'clients', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@client')->name('client.index');
    Route::post('/store', 'Web\ClientController@store')->name('client.store');
    Route::get('{id}/show', 'Web\ClientController@show')->name('client.show');
    Route::get('/create', 'Web\ClientController@create')->name('client.create');
    Route::get('/{id}/delete', 'Web\ClientController@destroy')->name('client.delete');
    Route::get('/{id}/edit', 'Web\ClientController@edit')->name('client.edit');
    Route::put('/{id}', 'Web\ClientController@update')->name('client.update');
    Route::post('/search', 'Web\ClientController@searchByName')->name('client.searchByName');
    Route::get('/search', 'Web\ClientController@searchByName');
});
Route::group(['prefix'=> 'clinics', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@clinic')->name('clinic.index');
    Route::get('/create', 'Web\ClinicController@create')->name('clinic.create');
    Route::post('/', 'Web\ClinicController@store')->name('clinic.store');
    Route::get('/{clinic}/delete', 'Web\ClinicController@destroy')->name('clinic.delete');
    Route::get('/{clinic}/edit', 'Web\ClinicController@edit')->name('clinic.edit');
    Route::put('/{clinic}', 'Web\ClinicController@update')->name('clinic.update');
});
Route::group(['prefix'=> 'medicines', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@medicine')->name('medicine.index');
    Route::post('/store', 'Web\MedicineController@store')->name('medicine.store');
    Route::get('/create', 'Web\MedicineController@create')->name('medicine.create');
    Route::get('/{id}/delete', 'Web\MedicineController@destroy')->name('medicine.delete');
    Route::get('/{id}/edit', 'Web\MedicineController@edit')->name('medicine.edit');
    Route::put('/{id}', 'Web\MedicineController@update')->name('medicine.update');
    Route::post('/search', 'Web\MedicineController@searchByName')->name('medicine.searchByName');
    Route::get('/search', 'Web\MedicineController@searchByName');
});
Route::group(['prefix'=> 'receipts', 'middleware' => 'auth'], function () 
{
    Route::get('/pdf/{receipt}', 'Web\ReceiptController@generatePDF')->name('receipt.pdf');
    Route::get('/', 'Web\HomeController@receipt')->name('receipt.index');
    Route::post('/store', 'Web\ReceiptController@store')->name('receipt.store');
    Route::get('/create/client/{client}', 'Web\ReceiptController@create')->name('receipt.create');
    Route::get('/{receipt}/delete', 'Web\ReceiptController@destroy')->name('receipt.delete');
    Route::get('/{receipt}/edit', 'Web\ReceiptController@edit')->name('receipt.edit');
    Route::post('/{receipt}', 'Web\ReceiptController@update')->name('receipt.update');
    Route::get('/{receipt}', 'Web\ReceiptController@show')->name('receipt.show');
    
});
Route::group(['prefix'=> 'exams', 'middleware' => 'auth'], function () 
{
    Route::get('/pdf/{exam}', 'Web\ExamController@generatePDF')->name('exam.pdf');
    Route::get('/download/{exam}', 'Web\ExamController@download')->name('exam.download');
    Route::get('/deliver/{exam}', 'Web\ExamController@deliver')->name('exam.deliver');
    Route::get('/', 'Web\HomeController@exam')->name('exam.index');
    Route::post('/', 'Web\ExamController@store')->name('exam.store');
    Route::get('/create/client/{client}', 'Web\ExamController@create')->name('exam.create');
    Route::get('/{exam}/delete', 'Web\ExamController@destroy')->name('exam.delete');
    Route::get('/{exam}/edit', 'Web\ExamController@edit')->name('exam.edit');
    Route::put('/{exam}', 'Web\ExamController@update')->name('exam.update');
    Route::get('/{exam}', 'Web\ExamController@show')->name('exam.show'); 
    Route::get('/{exam}', 'Web\ExamController@evaluate')->name('exam.evaluate'); 
    Route::post('/result/{exam}', 'Web\ExamController@result')->name('exam.result'); 
});
Route::group(['prefix'=> 'medicine_prescription', 'middleware' => 'auth'], function () 
{
    Route::post('/store/receipt/{receipt}', 'Web\MedicinePrescriptionController@store')->name('medicinePrescription.store');
    Route::get('/create/receipt/{receipt}', 'Web\MedicinePrescriptionController@create')->name('medicinePrescription.create');
    Route::get('/{receipt}/{prescript_medicine}/delete', 'Web\MedicinePrescriptionController@destroy')->name('medicinePrescription.delete');
    Route::get('/{receipt}/{prescript_medicine}/edit', 'Web\MedicinePrescriptionController@edit')->name('medicinePrescription.edit');
    Route::put('/{receipt}/{prescript_medicine}/update', 'Web\MedicinePrescriptionController@update')->name('medicinePrescription.update');
});

Route::group(['prefix'=> 'reports', 'middleware' => 'auth'], function () 
{
    Route::get('/', 'Web\HomeController@report')->name('report.show');
});