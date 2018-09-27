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
Route::get('/patient/search', 'PatientsController@searchPatient')->name('searchpatient');