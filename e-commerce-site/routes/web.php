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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','HomeController@index');
Route::resource('product', 'ProductController'); //todo read up on resource controllers

Route::get( 'cart/add/{product_id}', 'CartController@add' )->name('cart.add');
Route::get( 'cart/', 'CartController@index' );
Route::get( 'cart/show', 'CartController@show' )->name('cart.show');
