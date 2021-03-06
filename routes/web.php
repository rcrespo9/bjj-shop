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

Route::get('/', 'ShopController@index');
Route::get('/checkout', 'CheckoutController@index');
Route::get('/thanks', 'ThanksController');
Route::resource('orders', 'CheckoutController')->only(['store']);

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrdersController')->except(['create', 'store']);
    Route::get('/users', 'UsersController@index');
});
