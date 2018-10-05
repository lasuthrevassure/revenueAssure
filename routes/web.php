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

// request module
Route::get('/requests', 'RequestController@index')->name('requests');
Route::post('/request/add', 'RequestController@store')->name('storerequest');
Route::get('request/view/{id}','RequestController@show')->name('viewrequest');

//user module
Route::get('/users', 'Auth\RegisterController@index')->name('users');
Route::get('/users/user/{id}', 'Auth\RegisterController@edit')->name('user');
Route::post('/users/user/{id}', 'Auth\RegisterController@update')->name('user');
Route::get('/role/add', 'Auth\RegisterController@createrole')->name('addrole');
Route::post('/role/add', 'Auth\RegisterController@storerole')->name('addrole');

//payment module
Route::get('/payments', 'PaymentsController@index')->name('payments');
Route::get('/payments/requests', 'PaymentsController@payemntRequests')->name('paymentrequests');
Route::get('/payments/update/{id}', 'PaymentsController@create')->name('createpayment');
Route::post('/payments/update/{id}', 'PaymentsController@store')->name('createpayment');
