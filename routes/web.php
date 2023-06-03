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
Route::get('/', 'PageController@user')->name('home');
Route::get('/services-offer', 'PageController@ServicesOffer')->name('services-offer');
Route::get('/about-us', 'PageController@aboutUs')->name('about-us');
Route::get('/contact-us', 'PageController@contactUs')->name('contact-us');
Route::post('/submit/message', 'PageController@submit')->name('submit.message');
Route::get('/privacy-policy', 'PageController@privacyPolicy')->name('privacy-policy');
Route::get('/terms-of-service', 'PageController@termsOfService')->name('terms-of-service');
Route::get('/register/pet', 'PageController@registerPets')->name('pets.registration');
Route::get('/pets/profile/information', 'PageController@petsProfile')->name('pets.profile.information');

// AUTHENTICATION
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

Route::group(['middleware' => ['auth']], function() {
	// CLIENT APPOINTMENT
	Route::group(['prefix' => 'appointment'], function() {
		// Index
		Route::get('/', 'ClientAppointmentController@index')->name('client.appointment.index');
		
		// Create
		Route::get('/create', 'ClientAppointmentController@create')->name('client.appointment.create');
		Route::post('/store', 'ClientAppointmentController@store')->name('client.appointment.store');
	});

	// USER PROFILE
	Route::get('/profile/{id}', 'UserController@profile')->name('profile');

	// DASHBOARD REDIRECT
	Route::get('/dashboard', 'PageController@redirectDashboard')->name('dashboard.redirect');

	Route::group(['prefix' => 'admin'], function () {
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

			//Print
			Route::get('/print/{id}', 'ClientController@printHistory')->name('history.print');

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

			// Delete
			Route::get('/archive/{id}/pet','ClientController@delete')->name('deleted');

			// Restore
			Route::get('/restore/{id}/pet','ClientController@restore')->name('restore');

			//Archive - Index
			Route::get('/archived','ClientController@archiveIndex')->name('archived.index');
			
		});

		// TRANSACTION
		Route::group(['prefix' => 'transaction'], function () {

			// TRANSACTION - PRODUCT
			Route::group(['prefix' => 'products-order'], function () {
				// Index
				Route::get('/', 'ProductOrderTransactionController@productsOrder')->name('transaction.products-order');

				// Create
				Route::get('/create', 'ProductOrderTransactionController@createproductsOrder')->name('transaction.products.create');
				Route::post('/submit/order','ProductOrderTransactionController@submitOrder')->name('transaction.submit.order');

				// Show
				Route::get('/view/{id}', 'ProductOrderTransactionController@viewProductsOrder')->name('transaction.products.view');

				// Void
				Route::get('/{id}/void', 'ProductOrderTransactionController@voidTransaction')->name('transaction.product.order.void');
			});


			// TRANSACTION - SERVICES
			Route::group(['prefix' => 'service'], function () {
				//Index
				Route::get('/', 'ServiceTransactionController@Services')->name('transaction.service');

				//Create Consultation
				Route::get('/create', 'ServiceTransactionController@createConsultation')->name('transaction.consultation.create');
				//Submit Consultation
				Route::post('/submit/consultation/transaction','ServiceTransactionController@submitConsultation')->name('submit.consultation');
				//Show Consultation
				Route::get('/consultation/show/{id}', 'ServiceTransactionController@showConsultation')->name('consultation.transaction.show');

				//Create-Vaccination
				Route::get('/create/vaccination', 'ServiceTransactionController@createVaccination')->name('transaction.vaccination.create');
				// Submit-Vaccination
				Route::post('/submit/vaccination/transaction','ServiceTransactionController@submitVaccination')->name('submit.vaccination');
				//Show Vaccination
				Route::get('/vaccination/show/{id}', 'ServiceTransactionController@showVaccination')->name('vaccination.transaction.show');

				//Create-Grooming
				Route::get('/create/grooming', 'ServiceTransactionController@createGrooming')->name('transaction.grooming.create');
				// Submit-Grooming
				Route::post('/submit/grooming/transaction', 'ServiceTransactionController@submitGrooming')->name('submit.grooming');
				//Show Grooming
				Route::get('/grooming/show/{id}', 'ServiceTransactionController@showGrooming')->name('grooming.transaction.show');

				//Create-Boarding
				Route::get('/create/boarding', 'ServiceTransactionController@createBoarding')->name('transaction.boarding.create');
				// Submit-Boarding
				Route::post('/submit/boarding/transaction','ServiceTransactionController@submitBoarding')->name('submit.boarding');
				//Show Grooming
				Route::get('/boarding/show/{id}', 'ServiceTransactionController@showBoarding')->name('boarding.transaction.show');

				//Create-Other-Transaction
				Route::get('/create/other', 'ServiceTransactionController@createOthers')->name('other.transaction.create');
				// Submit-Other-Transaction
				Route::post('/submit/other/transaction','ServiceTransactionController@submitOtherTransaction')->name('submit.other.transaction');
				//Show Transaction
				Route::get('/transaction/show/{id}', 'ServiceTransactionController@showTransaction')->name('other.transaction.show');

				//Delete
				Route::get('/{id}/delete', 'ServiceTransactionController@deleteService')->name('transaction.service.delete');
				// VoidConsultation
				Route::get('/{id}/void/consultation', 'ServiceTransactionController@voidConsultation')->name('transaction.consultation.void');

				// VoidConsultation
				Route::get('/{id}/void/vaccination', 'ServiceTransactionController@voidVaccination')->name('transaction.vaccination.void');

				// VoidGrooming
				Route::get('/{id}/void/grooming', 'ServiceTransactionController@voidGrooming')->name('transaction.grooming.void');

				// VoidConsultation
				Route::get('/{id}/void/boarding', 'ServiceTransactionController@voidBoarding')->name('transaction.boarding.void');
				
				// VoidTransaction
				Route::get('/{id}/void', 'ServiceTransactionController@voidTransaction')->name('transaction.void');
			
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

				// Archive Index
				Route::get('/product/archived/', 'InventoryController@archiveIndexProduct')->name('archive.product');

				// Restore
				Route::get('/product/{id}/restore', 'InventoryController@restoreProduct')->name('restore.product');

				// Delete
				Route::get('/product/{id}/delete/', 'InventoryController@deleteProduct')->name('product.delete');
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
			Route::post('/submit/appointment', 'AppointmentController@saveAppointments')->name('submit.appointments');

			//Update
			Route::post('/update/{id}', 'AppointmentController@updateAppointments')->name('update.appointments');

			// Accept
			Route::get('/Accept/{id}','AppointmentController@acceptAppointment')->name('accept.appointment');

			// Reject
			Route::post('/Reject/{id}','AppointmentController@rejectAppointment')->name('reject.appointment');

			// Reason
			Route::get('/Reason/{id}','AppointmentController@reason')->name('reason.appointment');

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

			// Archive
			Route::get('/archived', 'ServiceCategoryController@archiveServicesCategory')->name('service_category.archive');
			
			// Restore
			Route::get('/{id}/restore', 'ServiceCategoryController@restoreServiceCategory')->name('service_category.restore');

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
				Route::get('/delete/{serviceId}', 'ServiceController@deleteService')->name('service.delete');

				// Archive
				Route::get('/archived/service', 'ServiceController@archiveServices')->name('services.archive');
				
				// Restore
				Route::get('/{serviceId}/restore', 'ServiceController@restoreService')->name('service.restore');

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

					// Archive
					Route::get('/archived/variation', 'ServiceVariationController@archivedVariation')->name('variation.archive');
					
					// Restore
					Route::get('/{variationId}/restore', 'ServiceVariationController@restoreVariation')->name('variation.restore');

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
		Route::get('/message/{id}/viewed','SettingsController@viewMessage')->name('view.message');
		Route::get('/contact/{id}/show', 'SettingsController@contactShow')->name('contact.show');
		Route::get('/message/{id}/response', 'SettingsController@messageResponse')->name('response');

		// SETTINGS - UNAVAILABLE DATES
		Route::get('/settings/unavailable-dates/create', 'SettingsController@unavailableDatesCreate')->name('settings.unavailable-dates.create');
		Route::post('/settings/unavailable-dates/submit', 'SettingsController@unavailableDatesSubmit')->name('settings.unavailable-dates.submit');
		Route::get('/settings/unavailable-dates/{id}/remove', 'SettingsController@unavailableDatesRemove')->name('settings.unavailable-dates.remove');

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

			// Notify Client
			Route::get('/notify/clients','UserController@notifyClients')->name('notify-client');
			Route::post('/notify/clients/submit','UserController@submitNotification')->name('notify-client.submit');
		});
	});
});