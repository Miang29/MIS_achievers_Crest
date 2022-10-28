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

	// Reservation
	Route::get('/reservation', 'PageController@reservation')->name('reservation');
	Route::get('/create-reservation', 'PageController@createReservation')->name('create-reservation');
	Route::get('/edit-client', 'PageController@editClient')->name('edit-client');
	Route::get('/view-client', 'PageController@viewClient')->name('view-client');
	Route::get('/edit-pet', 'PageController@editPet')->name('edit-pet');
	Route::get('/view-pet', 'PageController@viewPet')->name('view-pet');


	//---------------------SERVICES--------------------------//

	//Consultation
	Route::get('/consultation', 'ServicesController@consultation')->name('consultation');
	Route::get('/create-consultation', 'ServicesController@createConsultation')->name('create-consultation');
	Route::get('/view-consultation', 'ServicesController@viewConsultation')->name('view-consultation');
	Route::get('/edit-consultation', 'ServicesController@editConsultation')->name('edit-consultation');

	//VACCINATION
	Route::get('/vaccination', 'ServicesController@vaccination')->name('vaccination');
	Route::get('/create-vaccination', 'ServicesController@createVaccination')->name('create-vaccination');
	Route::get('/edit-vaccination', 'ServicesController@editVaccination')->name('edit-vaccination');
	Route::get('/view-vaccination', 'ServicesController@viewVaccination')->name('view-vaccination');

	//PETBOARDING
	Route::get('/boarding', 'ServicesController@boarding')->name('boarding');
	Route::get('/create-boarding', 'ServicesController@createBoarding')->name('create-boarding');
	Route::get('/edit-boarding', 'ServicesController@editBoarding')->name('edit-boarding');
	Route::get('/view-boarding', 'ServicesController@viewBoarding')->name('view-boarding');

	//PETGROOMING
	Route::get('/grooming', 'ServicesController@grooming')->name('grooming');
	Route::get('/create-grooming', 'ServicesController@createGrooming')->name('create-grooming');
	Route::get('/edit-grooming', 'ServicesController@editGrooming')->name('edit-grooming');
	Route::get('/view-grooming', 'ServicesController@viewGrooming')->name('view-grooming');


	// TRANSACTION
	Route::get('/transaction', 'PageController@transaction')->name('transaction');
	Route::get('/create-transaction', 'PageController@createTransaction')->name('create-transaction');
	Route::get('/view-transaction', 'PageController@viewTransaction')->name('view-transaction');