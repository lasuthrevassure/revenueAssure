<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// get local government
Route::get('fetch-lga/{id}','PatientsController@fetchlga');

// patient module
Route::get('/patient/add', 'PatientsController@create')->name('addpatient');
Route::post('/patient/add', 'PatientsController@store')->name('storepatient');
Route::get('/patient', 'PatientsController@index')->name('patient');
Route::post('/patient', 'PatientsController@index')->name('patientfilter');
Route::get('/patient/search', 'PatientsController@searchPatient')->name('searchpatient');
Route::post('/patient/search', 'PatientsController@searchPatient')->name('searchpatientfilter');
Route::get('/search','PatientsController@search');
Route::get('/patient/view/{id}','PatientsController@show')->name('viewpatient');
Route::post('/patient/update','PatientsController@update')->name('updatepatient');

// request module
Route::get('/requests', 'RequestController@index')->name('requests');
Route::post('/requests', 'RequestController@index')->name('requestfilter');
Route::post('/request/add', 'RequestController@store')->name('storerequest');
Route::get('request/generate/{patientRequest}/report/{document}','PDFGeneratorController@showForm')->name('showForm');
Route::post('request/store/{patientRequest}/report/{document}','PDFGeneratorController@storeForm')->name('storeForm');
Route::get('request/preview/{documentRequest}','PDFGeneratorController@previewForm')->name('previewForm');
Route::get('docrequest/{documentRequest}','PDFGeneratorController@indexForm')->name('indexForm');
Route::get('emailrequest/{documentRequest}','PDFGeneratorController@emailForm')->name('emailForm');

Route::get('request/view/{id}','RequestController@show')->name('viewrequest');
Route::post('request/view','RequestController@update')->name('updaterequest');
Route::post('request/delete','RequestController@destroy')->name('deleterequest');

//user module
Route::get('/users', 'Auth\RegisterController@index')->name('users');
Route::post('/users', 'Auth\RegisterController@index')->name('userfilter');
Route::get('/users/user/{id}', 'Auth\RegisterController@edit')->name('user');
Route::post('/users/user/{id}', 'Auth\RegisterController@update')->name('user');
Route::get('/role/add', 'Auth\RegisterController@createrole')->name('addrole');
Route::post('/role/add', 'Auth\RegisterController@storerole')->name('addrole');

//payment module
Route::get('/payments', 'PaymentsController@index')->name('payments');
Route::post('/payments', 'PaymentsController@index')->name('paymentfilter');
Route::get('/payments/requests', 'PaymentsController@payemntRequests')->name('paymentrequests');
Route::post('/payments/requests', 'PaymentsController@payemntRequests')->name('paymentrequestfilter');
Route::get('/payments/update/{id}', 'PaymentsController@create')->name('createpayment');
Route::post('/payments/update', 'PaymentsController@store')->name('createpayment');
Route::get('/payments/view/{id}', 'PaymentsController@show')->name('viewpayment');

//reports and certificate module
// Route::get('/document/form/{document}', 'PDFGeneratorController@showForm')->name('showForm');
// Route::post('/document/form/{document}', 'PDFGeneratorController@indexForm')->name('indexForm');
Route::get('/document/index', 'PDFGeneratorController@index')->name('documentIndex');

//payment module
Route::get('/signatures', 'SignatureController@index')->name('signatures');
Route::get('/signatures/create', 'SignatureController@create')->name('create_signature');
Route::post('/signatures/create', 'SignatureController@store')->name('store_signature');
Route::get('/signatures/edit/{signature}', 'SignatureController@edit')->name('edit_signature');
Route::post('/signatures/update/{signature}', 'SignatureController@update')->name('update_signature');
Route::get('/signatures/view/{signature}', 'SignatureController@show')->name('show_signature');
Route::post('/signatures/delete/{signature}', 'SignatureController@destroy')->name('delete_signature');
