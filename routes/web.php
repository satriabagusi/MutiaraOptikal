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

Route::get('/', 'PagesController@index')->name('dashboard');
Route::get('/home', 'PagesController@home')->name('home');
Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@__login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/account', 'UserController@show');
Route::get('/account/edit', 'UserController@edit');
Route::post('/account/edit', 'UserController@update')->name('edit-account');
Route::get('/admin/add-employee', 'UserController@create');
Route::post('/admin/add-employee', 'UserController@store')->name('add-employee');
Route::get('/admin/add-frame', 'FrameController@create');
Route::post('/admin/add-frame/addBrand', 'FrameController@storeBrand')->name('add-brand');
Route::post('/admin/add-frame/addType', 'FrameController@storeType')->name('add-type');
Route::get('/patient/list-patient', 'PatientController@index');
Route::get('/patient/new-patient', 'PatientController@create');
Route::post('/patient/new-patient/store', 'PatientController@store')->name('add-patient');
Route::get('/transaction/new-transaction', 'TransactionController@create');
Route::get('/transaction/getPatients/{id}', 'TransactionController@getPatient')->name('getPatients');
Route::get('/transaction/getFrames/{id}', 'TransactionController@getFrame')->name('getFrames');
Route::post('/transaction/add', 'TransactionController@store')->name('save-transaction');
Route::get('/transaction/monthly', 'TransactionController@getEarningMonthly')->name('getEarningMonthly');
Route::get('/transaction/print/{id}', 'TransactionController@printTransaction');
Route::get('/transaction/list-transaction', 'TransactionController@index');
Route::get('/transaction/detail/{id}', 'TransactionController@show')->name('getDetailTransaction');
Route::get('/transaction/repayment/', 'TransactionController@edit')->name('repayment');
Route::get('/transaction/detail/repayment/{id}', 'TransactionController@getDetailRepayment')->name('getDetailTransaction');
Route::post('/transaction/repayment/update', 'TransactionController@update')->name('save-repayment');
Route::get('/transaction/receipt/find', 'TransactionController@findReceipt');