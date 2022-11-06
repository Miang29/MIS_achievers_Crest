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

Route::get('/', function() {
	return redirect()->route('login');
})->name('home');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/authenticate', 'UserController@authenticate')->name('authenticate');
Route::get('/dashboard', 'PageController@redirectDashboard')->name('dashboard.redirect');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
	// LOGOUT
	Route::get('/logout', 'UserController@logout')->name('logout');

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
	Route::get('/category', ' InventoryController@category')->name('category');
	Route::get('/create-category', ' InventoryController@createCategory')->name('create-category');
	Route::get('/view-category', ' InventoryController@viewCategory')->name('view-category');
	Route::get('/edit-category', ' InventoryController@editCategory')->name('edit-category');

	// PRODUCT
	Route::get('/view-product', ' InventoryController@viewProduct')->name('view-product');
	Route::get('/create-product', ' InventoryController@createProduct')->name('create-product');
	Route::get('/edit-product', ' InventoryController@editProduct')->name('edit-product');

	// APPOINTMENT
	Route::group(['prefix' => 'appointments'], function() {
		// Index
		Route::get('/', 'AppointmentController@index')->name('appointments.index');
		
		// Create
		Route::get('/create', 'AppointmentController@create')->name('appointments.create');
		
		// Edit
		Route::get('/{id}/edit', 'AppointmentController@edit')->name('appointments.edit');
		
		// Show
		Route::get('/{id}', 'AppointmentController@show')->name('appointments.show');
	});
	
	//REPORT
	Route::get('/report', ' ReportController@report')->name('report');

	//SETTINGS
	Route::get('/settings', 'SettingsController@settings')->name('settings');

	//USERACCOUNT
	Route::get('/user-account', 'UserController@userAccount')->name('user-account');
	Route::get('/create-user-account', 'UserController@createuserAccount')->name('create-user-account');
	Route::get('/edit-user-account', 'UserController@edituserAccount')->name('edit-user-account');

	//CLIENTPANEL
	Route::get('/user', 'PageController@user')->name('user');
});