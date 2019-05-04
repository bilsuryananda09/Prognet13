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

Route::get('/', function () {
    return view('/user/layouthome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

// Route::view('/home', 'home')->middleware('auth');

Route::get('/admin', 'AdminController@index');

Route::resource('/admin/couriers', 'CourierController');

Route::resource('/admin/products', 'ProductController');

Route::resource('/admin/productcategories', 'ProductCategoryController');

Route::resource('/admin/productcategorydetails', 'ProductCategoryDetailsController');

Auth::routes(['verify' => true]);

// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');