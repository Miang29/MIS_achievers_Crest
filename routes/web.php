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
    return view('admin.home.menu');
})->name('menu'); 

Route::get('/signin', 'userController@LoginPage')->name('signin'); 

Route::get('/signup', 'userController@SignupPage' )->name('signup'); 

Route::get('/client', function() {
    return view('admin.home.registration.client');
})->name('client'); 

Route::get('/pet', function() {
    return view('admin.home.registration.pet');
})->name('pet'); 

Route::get('/consultation', function() {
    return view('admin.home.services.consultation');
})->name('consultation'); 

Route::get('/vaccination', function() {
    return view('admin.home.services.vaccination');
})->name('vaccination'); 