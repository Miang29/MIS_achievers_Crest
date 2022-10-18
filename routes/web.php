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

//HOME
Route::get('/', 'MenuController@menuPage')->name('menu'); 
Route::get('/dashboard','MenuController@dashboardPage' )->name('dashboard'); 
Route::get('/stocks', 'MenuController@stocksPage')->name('stocks'); 


//REGISTRATION
Route::get('/client','MenuController@clientPage' )->name('client'); 
Route::get('/pet','MenuController@petPage'  )->name('pet'); 


//SERVICES
Route::get('/consultation', 'MenuController@consultPage' )->name('consultation'); 
Route::get('/vaccination', 'MenuController@vaccinePage' )->name('vaccination'); 


//USERS
Route::get('/signin', 'userController@LoginPage')->name('signin'); 
Route::get('/signup', 'userController@SignupPage' )->name('signup'); 
Route::get('/users', 'userController@userAccountPage')->name('users'); 


//Authenticate&store
Route::post('/authenticate', 'userController@authenticate' )->name('authenticate'); 
Route::post('/store-signup', 'userController@store' )->name('store'); 

//Logout

Route::get('/logout', 'userController@logout')->name('logout'); 


