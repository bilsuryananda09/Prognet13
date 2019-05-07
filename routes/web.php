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

// Route::get('/', function () {
//     return view('/user/layouthome');
// });

Auth::routes(['verify' => true]);

//Auth::routes();
Route::get('/', 'UserController@index')->name('index');
Route::get('/about', 'UserController@about')->name('about');
Route::get('/product', 'UserController@product')->name('product');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::group(['prefix' => 'admin', 'guard' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::resource('/couriers', 'CourierController');
    Route::resource('/products', 'ProductController');
    Route::resource('/productcategories', 'ProductCategoryController');
    Route::resource('/productimages', 'ProductImageController');
});


// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
// Route::view('/home', 'home')->middleware('auth');