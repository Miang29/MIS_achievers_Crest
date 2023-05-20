<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ALL NOTIFY
Route::group(['prefix' => 'notify'], function() {
	// NOTIFY CLIENTS
	Route::post('/clients', 'UserController@sendNotification')->name('api.notify.client.send');
});

// ALL FETCHES
Route::group(['prefix' => 'fetch'], function() {
	// FETCH UNAVAIBLE TIME
	Route::post('/unavailable-time', 'AppointmentController@fetchAvailableTime')->name('api.fetch.unavailable-time');
});