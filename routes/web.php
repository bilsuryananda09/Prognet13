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
    return view('/user/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::view('/home', 'home')->middleware('auth');
<<<<<<< HEAD

Route::get('/admin', 'AdminController@index');
=======
//<<<<<<< HEAD
Route::get('/admin', 'AdminController@index');
//=======
Route::view('/admin', 'admin.dashboard');
//>>>>>>> a321d8882c0a405dae48f5bced09437ea0dd8acb
>>>>>>> d4c30b533d1bf8df9452bf0dcf5449f493b3a3db

Route::resource('couriers', 'CourierController');

Route::resource('products', 'ProductController');

Route::resource('productcategories', 'ProductCategoryController');