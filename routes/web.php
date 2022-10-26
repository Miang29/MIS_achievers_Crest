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

Route::get('/login', 'UserController@login')->name('login');
Route::post('/authenticate', 'UserController@authenticate')->name('authenticate');

// Route::group('middleware' => ['auth'], function() {
	// DASHBOARD
	Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');

	// Registration
	Route::get('/reservation', 'PageController@reservation')->name('reservation');
	Route::get('/Create-Reservation', 'PageController@createReservation')->name('create-reservation');