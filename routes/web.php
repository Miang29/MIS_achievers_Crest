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

	// TRANSACTION
	Route::get('/products-order', 'transactionController@productsOrder')->name('products-order');
	Route::get('/create-products-order', 'transactionController@createproductsOrder')->name('create-products-order');
	Route::get('/view-products-order', 'transactionController@viewproductsOrder')->name('view-products-order');

	Route::get('/services', 'transactionController@services')->name('services');
	Route::get('/create-services', 'transactionController@createServices')->name('create-services');
	Route::get('/view-services', 'transactionController@viewServices')->name('view-services');

	
	// INVENTORY
	Route::get('/category', 'PageController@category')->name('category');
	Route::get('/create-category', 'PageController@createCategory')->name('create-category');
	Route::get('/view-category', 'PageController@viewCategory')->name('view-category');
	Route::get('/edit-category', 'PageController@editCategory')->name('edit-category');
	
    //Inventory product
	Route::get('/view-product', 'PageController@viewProduct')->name('view-product');
	Route::get('/create-product', 'PageController@createProduct')->name('create-product');
	Route::get('/edit-product', 'PageController@editProduct')->name('edit-product');

	//APPOINTMENT
	Route::get('/appointment', 'PageController@appointment')->name('appointment');
	Route::get('/create-appointment', 'PageController@CreateAppointment')->name('create-appointment');
	Route::get('/edit-appointment', 'PageController@editAppointment')->name('edit-appointment');
	Route::get('/view-appointment', 'PageController@viewAppointment')->name('view-appointment');
	
	//REPORT
	Route::get('/report', 'PageController@report')->name('report');

	//SETTINGS
	Route::get('/settings', 'PageController@settings')->name('settings');

	//USERACCOUNT
	Route::get('/user-account', 'userController@userAccount')->name('user-account');
	Route::get('/create-user-account', 'userController@createuserAccount')->name('create-user-account');
	Route::get('/edit-user-account', 'userController@edituserAccount')->name('edit-user-account');

	//CLIENTPANEL
	Route::get('/user', 'PageController@user')->name('user');