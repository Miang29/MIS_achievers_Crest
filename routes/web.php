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

	// CLIENT PROFILE
	Route::get('/client-profile', 'ClientController@clientprofile')->name('client-profile');
	Route::get('/create-client-profile', 'ClientController@createClientprofile')->name('create-client-profile');
	Route::get('/edit-client-profile', 'ClientController@editClientprofile')->name('edit-client-profile');
	Route::get('/view-client-profile', 'ClientController@viewClientprofile')->name('view-client-profile');
	Route::get('/edit-pet', 'ClientController@editPetprofile')->name('edit-pet');
	Route::get('/view-pet', 'ClientController@viewPetprofile')->name('view-pet');

	// TRANSACTION
	Route::get('/products-order', 'transactionController@productsOrder')->name('products-order');
	Route::get('/create-products-order', 'transactionController@createproductsOrder')->name('create-products-order');
	Route::get('/view-products-order', 'transactionController@viewproductsOrder')->name('view-products-order');

	Route::get('/services', 'transactionController@services')->name('services');
	Route::get('/create-services', 'transactionController@createServices')->name('create-services');
	Route::get('/view-services', 'transactionController@viewServices')->name('view-services');

	
	// INVENTORY
	Route::get('/category', 'InventoryController@category')->name('category');
	Route::get('/create-category', 'InventoryController@createCategory')->name('create-category');
	Route::get('/view-category', 'InventoryController@viewCategory')->name('view-category');
	Route::get('/edit-category', 'InventoryController@editCategory')->name('edit-category');
    //product
	Route::get('/view-product', 'InventoryController@viewProduct')->name('view-product');
	Route::get('/create-product', 'InventoryController@createProduct')->name('create-product');
	Route::get('/edit-product', 'InventoryController@editProduct')->name('edit-product');

	//APPOINTMENT
	Route::get('/appointment', 'PageController@appointment')->name('appointment');
	Route::get('/create-appointment', 'PageController@CreateAppointment')->name('create-appointment');
	Route::get('/edit-appointment', 'PageController@editAppointment')->name('edit-appointment');
	Route::get('/view-appointment', 'PageController@viewAppointment')->name('view-appointment');
	
	//REPORT
	Route::get('/report', ' ReportController@report')->name('report');

	//SETTINGS
	Route::get('/settings', 'SettingsController@settings')->name('settings');

	//USERACCOUNT
	Route::get('/user-account', 'userController@userAccount')->name('user-account');
	Route::get('/create-user-account', 'userController@createuserAccount')->name('create-user-account');
	Route::get('/edit-user-account', 'userController@edituserAccount')->name('edit-user-account');

	//CLIENTPANEL
	Route::get('/user', 'PageController@user')->name('user');