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
Route::get('/schedule/date', 'PageController@dateSched')->name('schedule-date');
Route::get('/create/appointment', 'PageController@appointmentsCreate')->name('create-appointment');
Route::post('/submit-appointments', 'PageController@submitAppointments')->name('submit-appointments');
Route::get('/services-offer', 'PageController@ServicesOffer')->name('services-offer');
Route::get('/about-us', 'PageController@aboutUs')->name('about-us');
Route::get('/contact-us', 'PageController@contactUs')->name('contact-us');
Route::get('/privacy-policy', 'PageController@privacyPolicy')->name('privacy-policy');
Route::get('/terms-of-service', 'PageController@termsOfService')->name('terms-of-service');
Route::get('/dashboard', 'PageController@redirectDashboard')->name('dashboard.redirect');



Route::get('/profile/{id}', 'UserController@profile')->name('profile');
Route::get('/login', 'UserController@login')->name('login');
Route::post('/authenticate', 'UserController@authenticate')->name('authenticate');
Route::get('/sign-up', 'ClientController@SignUp')->name('sign-up');
Route::post('/save', 'ClientController@save')->name('save');

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


	// Pet Information
	Route::group(['prefix' => 'pet-information'], function () {
		// Index
		Route::get('/', 'ClientController@index')->name('pet-information');

		// Create
		Route::get('/create', 'ClientController@create')->name('pet-information.create');

		// Add
		Route::get('/add/{clientId}', 'ClientController@add')->name('pet-information.pet.add');

		// POST // addPet
		Route::post('/add-pet/{clientId}', 'ClientController@addPet')->name('add-pet');

		// POST //SubmitPet
		Route::post('/submit-pet', 'ClientController@submitPet')->name('submit-pet');

		// POST //UpdatePet
		Route::post('/update-pet/{clientId}/pet/{id}/update', 'ClientController@updatePet')->name('update-pet');

		// Pet Edit
		Route::get('/view/{clientId}/pet/{id}/edit', 'ClientController@editPet')->name('pet-information.pet.edit');

		// Pet Show
		Route::get('/view/{id}/pet', 'ClientController@showPets')->name('pet-information.pet.show');

		// Pet History
		Route::get('/view/{id}/history', 'ClientController@petHistory')->name('pet-information.pet.history');
	});



	// TRANSACTION
	Route::group(['prefix' => 'transaction'], function () {
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
	Route::group(['prefix' => 'inventory'], function () {
		//Index
		Route::get('/', 'InventoryController@indexCategory')->name('inventory');

		//Create
		Route::get('/create', 'InventoryController@create')->name('category.create');
		Route::post('submit-products', 'InventoryController@submitProducts')->name('submit-products');

		//Update
		Route::post('/{id}/update', 'InventoryController@updateCategory')->name('category.update');

		// Delete
		Route::get('/{id}/delete/', 'InventoryController@deleteCategory')->name('category.delete');

		//CATEGORY
		//Create
		Route::get('/create-category', 'InventoryController@createCty')->name('create-category');
		Route::post('/submit-category', 'InventoryController@submitCty')->name('submit-category');

		//INVENTORY-PRODUCT
		Route::group(['prefix' => 'product'], function () {
			//Index
			Route::get('/{id}', 'InventoryController@index')->name('category.view');
			//Create 
			Route::get('/{id}/create', 'InventoryController@createProduct')->name('product.create');
			Route::post('/save-product/{id}', 'InventoryController@saveProduct')->name('save-product');

			//View
			Route::get('/{id}/view/product/{pid}', 'InventoryController@viewProduct')->name('product.view');
            //Add Stock
			Route::get('/add/{id}/stocks/{pid}','InventoryController@addStock')->name('product.add.stock');
			Route::post('/update/{id}/stocks/{pid}', 'InventoryController@updateStock')->name('update-stocks');

			//Edit
			Route::get('/view/{cid}/product/{id}/edit', 'InventoryController@edit')->name('product.edit');

			//Update
			Route::post('/product/{id}/update/{pid}', 'InventoryController@updateProducts')->name('product.update');

			// Delete
			Route::get('/product/delete/', 'InventoryController@delete')->name('product.delete');
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
		Route::get('/{id}}/edit', 'AppointmentController@edit')->name('appointments.edit');

		// Show
		Route::get('/{id}show', 'AppointmentController@show')->name('appointments.show');

		//Save
		Route::post('/save-appointments', 'AppointmentController@saveAppointments')->name('save-appointments');

		//Update
		Route::post('{id}/update-appointments', 'AppointmentController@updateAppointments')->name('update-appointments');
	});

	// -------------------- SERVICES CATEGORY ------------------------ //
	Route::group(['prefix' => '/service-category'], function () {
		// Index
		Route::get('/', 'ServiceCategoryController@index')->name('service_category.index');

		// Create
		Route::get('/create', 'ServiceCategoryController@create')->name('service_category.create');

		// Submit service in services create
		Route::post('/submit-service', 'ServiceCategoryController@submitService')->name('submit-service');

		// POST - to settings blade
		Route::post('/submit', 'ServiceCategoryController@submitServiceCategory')->name('submit-service-category');

		// Edit
		Route::post('/{id}/update', 'ServiceCategoryController@update')->name('service_category.update');

		// Delete
		Route::get('/{id}/delete', 'ServiceCategoryController@delete')->name('service_category.delete');

		// ----------------------- SERVICES ----------------------- //
		Route::group(['prefix' => '{id}/service'], function () {
			// Show - Category / Index - Service
			Route::get('/', 'ServiceController@index')->name('service.index');

			// Create
			Route::get('/create', "ServiceController@create")->name('service.create');
			Route::post('/submit', 'ServiceController@submitServiceVar')->name('submit-service-variation');
			// Update
			Route::post("/update/{serviceId}", "ServiceController@update")->name('service.update');

			// ADD new variation
			Route::get("/create/{serviceId}", "ServiceController@addVariation")->name('service_variation.create');
			Route::post("/submit/{serviceId}","ServiceController@submitVariation")->name('submit-variation');

			// Delete
			Route::get('/delete/{serviceId}', 'ServiceController@delete')->name('service.delete');

			// --------------------  VARIATIONS -------------------- //
			Route::group(['prefix' => '{serviceId}/variations'], function () {
				// Index
				Route::get("/", "ServiceVariationController@index")->name('service_variation.index');

				//Show
				Route::get("/{variationId}", "ServiceVariationController@show")->name('service_variation.show');

				// Edit
				Route::get("/{variationId}/edit", "ServiceVariationController@edit")->name('service_variation.edit');
				Route::post('update/{variationId}', 'ServiceVariationController@updateVar')->name('update-variation');

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
