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
	Route::get('/client-profile', 'PageController@clientprofile')->name('client-profile');
	Route::get('/create-client-profile', 'PageController@createClientprofile')->name('create-client-profile');
	Route::get('/edit-client-profile', 'PageController@editClientprofile')->name('edit-client-profile');
	Route::get('/view-client-profile', 'PageController@viewClientprofile')->name('view-client-profile');
	Route::get('/edit-pet', 'PageController@editPetprofile')->name('edit-pet');
	Route::get('/view-pet', 'PageController@viewPetprofile')->name('view-pet');


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
	Route::get('/products-order', 'transactionController@productsOrder')->name('products-order');
	Route::get('/create-products-order', 'transactionController@createproductsOrder')->name('create-products-order');
	Route::get('/view-products-order', 'transactionController@viewproductsOrder')->name('view-products-order');

	
	// INVENTORY
	Route::get('/inventory', 'PageController@inventory')->name('inventory');
	Route::get('/create-inventory', 'PageController@createInventory')->name('create-inventory');
	Route::get('/view-inventory', 'PageController@viewInventory')->name('view-inventory');
	Route::get('/edit-inventory', 'PageController@editInventory')->name('edit-inventory');

	//APPOINTMENT
	Route::get('/appointment', 'PageController@appointment')->name('appointment');
	Route::get('/create-appointment', 'PageController@CreateAppointment')->name('create-appointment');
	Route::get('/edit-appointment', 'PageController@Edit-Appointment')->name('edit-appointment');
	
	