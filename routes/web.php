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
Route::post('/submit-appointments', 'PageController@submitAppointments')->name('submit-appointments');
Route::get('/services-offer', 'PageController@ServicesOffer')->name('services-offer');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/authenticate', 'UserController@authenticate')->name('authenticate');
Route::get('/dashboard', 'PageController@redirectDashboard')->name('dashboard.redirect');

// FORGOT PASSWORD
Route::get('/forgot-password', 'PasswordController@forgotPassword')->name('forgot-password');
Route::post('/send-notification', 'PasswordController@sendNotification')->name('send-notification');
Route::post('/update-password', 'PasswordController@updatePassword')->name('update-password');


// NEW PASSWORD
Route::get('/new-password/{token?}', 'PasswordController@newPassword')->name('new-password');

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
		Route::get('/view/{clientId}/pet/{id}/edit', 'ClientController@editPet')->name('client-profile.pet.edit');

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
			Route::get('/create', 'TransactionController@createproductsOrder')->name('transaction.products.create');

			//Show
			Route::get('/view/{id}', 'TransactionController@viewProductsOrder')->name('transaction.products.view');

			//Delete
			Route::get('/{id}/delete', 'TransactionController@deleteproducstOrder')->name('transaction.products.delete');
		});


		// TRANSACTION - SERVICES
		Route::group(['prefix' => 'service'], function () {
			//Index
			Route::get('/', 'TransactionController@Service')->name('transaction.service');

			//Create
			Route::get('/create', 'TransactionController@createServices')->name('transaction.service.create');

			//Show
			Route::get('/show/{id}', 'TransactionController@show')->name('transaction.service.view');

			//Delete
			Route::get('/{id}/delete', 'TransactionController@deleteService')->name('transaction.service.delete');
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
		
		Route::post('/save-appointments', 'AppointmentController@saveAppointments')->name('save-appointments');

	});

	// SERVICES CATEGORY
	Route::group(['prefix' => 'service-category'], function() {
		// Index
		Route::get('/', 'ServiceCategoryController@index')->name('service_category.index');

		// Create
		Route::get('/create', 'ServiceCategoryController@create')->name('service_category.create');

		// Edit
		Route::post('/{id}/update', 'ServiceCategoryController@update')->name('service_category.update');
		
	    // Delete
		Route::get('/{id}/delete', 'ServiceCategoryController@delete')->name('service_category.delete');

		// SERVICES
		Route::group(['prefix' => '{id}/service'], function() {
			// Show - Category / Index - Service
			Route::get('/', 'ServiceController@index')->name('service.index');

			// Create
			Route::get("/create", "ServiceController@create")->name('service.create');

			// Update
			Route::post("/update/{serviceId}", "ServiceController@update")->name('service.update');

			// Delete
			Route::get('/delete/{serviceId}', 'ServiceController@delete')->name('service.delete');

			// VARIATIONS
			Route::group(['prefix' => '{serviceId}/variations'], function() {
				// Index
				Route::get("/", "ServiceVariationController@index")->name('service_variation.index');

				// Create
				Route::get("/create", "ServiceVariationController@create")->name('service_variation.create');
				
				// Show
				Route::get("/{variationId}", "ServiceVariationController@show")->name('service_variation.show');

				// Edit
				Route::get("/{variationId}/edit", "ServiceVariationController@edit")->name('service_variation.edit');

				// Delete
				Route::get('/{variationId}/delete', 'ServiceVariationController@delete')->name('service_variation.delete');
			});
		});
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
	Route::post('/update', 'SettingsController@update')->name('settings.update');
	Route::post('/remove-logo', 'SettingsController@removeLogo')->name('settings.remove-logo');


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
		Route::post('/{id}/update-user', 'UserController@updateUser')->name('update-user');
		
		//Delete
		Route::get('/{id}/delete', 'UserController@delete')->name('user.delete');

		//Change Password
		Route::get('/{id}/edit-password', 'UserController@editPassword')->name('user.edit-password');

		Route::post('/{id}/submit-password', 'UserController@submitPassword')->name('submit-password');
	
	});
});