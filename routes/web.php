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

use Symfony\Component\HttpKernel\Client;

Route::get('/', 'PageController@user')->name('home');
Route::get('/appointment', 'PageController@Appointment')->name('appointment');
Route::get('/services-offer', 'PageController@ServicesOffer')->name('services-offer');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/authenticate', 'UserController@authenticate')->name('authenticate');
Route::get('/dashboard', 'PageController@redirectDashboard')->name('dashboard.redirect');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
	Route::get('/', 'PageController@redirectDashboard')->name('dashboard.redirect');

	// LOGOUT
	Route::get('/logout', 'UserController@logout')->name('logout');


	// DASHBOARD
	Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');


	// CLIENT PROFILE
	Route::group(['prefix' => 'client-profile'], function () {
		// Index
		Route::get('/', 'ClientController@index')->name('client-profile');

		// Create
		Route::get('/create', 'ClientController@create')->name('client-profile.create');

		// Edit
		Route::get('/edit/{id}', 'ClientController@edit')->name('client-profile.edit');

		// Show
		Route::get('/view/{id}/client', 'ClientController@viewClientProfile')->name('client-profile.show');

		// Pet Edit
		Route::get('/view/{clientId}/pet/{id}/edit', 'ClientController@editPetProfile')->name('client-profile.pet.edit');

		// Pet Show
		Route::get('/view/{id}/pet', 'ClientController@showPets')->name('client-profile.pet.show');
	});


	// TRANSACTION
	Route::group(['prefix' => 'transaction'], function() {
		// TRANSACTION - PRODUCT
		Route::group(['prefix' => 'products-order'], function () {
			//Index
			Route::get('/', 'TransactionController@productsOrder')->name('transaction.products-order');

			//Create
			Route::get('/products/create', 'TransactionController@createproductsOrder')->name('transaction.products.create');

			//Show
			Route::get('/products/view', 'TransactionController@viewproductsOrder')->name('transaction.products.view');

			//Delete
			Route::get('/delete', 'TransactionController@deleteproducstOrder')->name('transaction.products.delete');
		});


		// TRANSACTION - SERVICES
		Route::group(['prefix' => 'service'], function () {
			//Index
			Route::get('/', 'TransactionController@Service')->name('transaction.service');

			//Create
			Route::get('/create', 'TransactionController@createServices')->name('transaction.service.create');

			//Show
			Route::get('/view', 'TransactionController@viewServices')->name('transaction.service.view');

			//Delete
			Route::get('/delete', 'TransactionController@deleteService')->name('transaction.service.delete');
		});
	});


	// INVENTORY
	Route::group(['prefix' => 'inventory/category'], function () {
		//Index
		Route::get('/', 'InventoryController@category')->name('category');

		//Create
		Route::get('/create', 'InventoryController@createCategory')->name('category.create');

		//Edit
		// Route::get('/{id}/edit', 'InventoryController@editCategory')->name('category.edit');
		
		//Update
		Route::post('/{id}/update', 'InventoryController@updateCategory')->name('category.update');

		// Delete
		Route::get('/{id}/delete/', 'InventoryController@deleteCategory')->name('category.delete');

		//INVENTORY-PRODUCT
		Route::group(['prefix' => '{id}'], function() {
			//Index
			Route::get('/product', 'InventoryController@index')->name('category.view');

			//Create
			Route::get('/product/create', 'InventoryController@create')->name('product.create');

			//View
			Route::get('/product/{prodId}', 'InventoryController@view')->name('product.view');

			//Edit
			Route::get('/product/{prodId}/edit', 'InventoryController@edit')->name('product.edit');

			//Update
			Route::post('/product/{prodId}/update', 'InventoryController@update')->name('product.update');

			// Delete
			Route::get('/product/{prodId}/delete/', 'InventoryController@delete')->name('product.delete');
		});
	});

	// APPOINTMENT
	Route::group(['prefix' => 'appointments'], function () {
		// Index
		Route::get('/', 'AppointmentController@index')->name('appointments.index');

		// Create
		Route::get('/create', 'AppointmentController@create')->name('appointments.create');

		// Delete
		Route::get('/{id}/delete', 'AppointmentController@delete')->name('appointments.delete');

		// Edit
		Route::get('/{id}/{petId}/edit', 'AppointmentController@edit')->name('appointments.edit');

		// Show
		Route::get('/{id}/{petId}', 'AppointmentController@show')->name('appointments.show');
	});

	//SERVICES
	Route::group(['prefix' => 'services'], function () {
		//Index - Category
		Route::get('/', 'ServiceCategoryController@index')->name('services.index');

		//Create
		Route::get('/create', 'ServiceCategoryController@create')->name('services.create');

		//Edit
		Route::post('/update/{id}', 'ServiceCategoryController@update')->name('services.update');
		
		//Delete
		Route::get('/delete/{id}', 'ServiceCategoryController@delete')->name('services.delete');

		// Show - Category / Index - Service
		Route::get('/{id}', 'ServiceCategoryController@show')->name('services.show');

		//Create - Service
		Route::get("/{id}/create", "ServicesController@create")->name('services.show.create');

		//Edit - Service
		Route::get("/{id}/edit", "ServicesController@edit")->name('services.show.edit');

		//Show - Service / Index - Variation
		Route::get("/{id}/view", "ServicesController@view")->name('services.show.view');
	});

	//REPORT
	Route::group(['prefix' => 'report'], function () {
		//Index
		Route::get('/', 'ReportController@report')->name('report.index');

		//Print
		Route::get('/print', 'ReportController@print')->name('report.print');
	});

	//SETTINGS
	Route::get('/settings', 'SettingsController@settings')->name('settings.index');


	//USER ACCOUNT
	Route::group(['prefix' => 'users'], function () {
		//Index
		Route::get('/', 'UserController@index')->name('user.index');

		//Store
		Route::post('/store', 'UserController@store')->name('user.store');

		//Create
		Route::get('/create', 'UserController@create')->name('user.create');

		//View
		Route::get('/{id}', 'UserController@view')->name('user.view');

		//Edit
		Route::get('/{id}/edit', 'UserController@edit')->name('user.edit');

		//Update
		Route::post('/{id}/update', 'UserController@update')->name('user.update');
		
		//Delete
		Route::get('/{id}/delete', 'UserController@delete')->name('user.delete');
	});
});