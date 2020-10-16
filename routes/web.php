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

Route::get('/', 'BookingsController@index');

Route::resource('booking', 'BookingsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('discounts','DiscountsController');
Route::resource('priceBands','PriceBandsController');
Route::resource('Employee','EmployeeController');
