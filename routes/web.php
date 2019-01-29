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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/adduser.part', function() {
	return view('parts.adduser');
});

Route::get('/searchuser.part', function() {
	return view('parts.searchuser');
});

Route::post('/customer/add', 'CustomerController@store');

Route::post('/customer/search', 'CustomerController@search');