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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as'   => 'index'
]);


Route::get('/product/{id}',[
   'uses' => 'FrontEndController@singleProduct',
   'as' => 'product.single'
]);

Route::post('/cart/add/', [
    'uses' => 'ShoppingController@addToCart',
    'as' => 'cart.add'
]);

Route::get('/cart',[
   'uses' => 'ShoppingController@cart',
   'as' => 'cart'
]);

Route::get('/cart/delete/{id}',[
    'uses' => 'ShoppingController@cartDelete',
    'as' => 'cart.delete'
]);

Route::get('cart/incr/{id}/{qty}', [
   'uses' => 'ShoppingController@incr',
   'as' => 'cart.incr'
]);

Route::get('cart/decr/{id}/{qty}', [
    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);

Route::get('/cart/rapid/add/{id}', [
   'uses' => 'ShoppingController@rapidAdd',
   'as' => 'cart.rapid.add'

]);

Route::get('/cart/checkout/', [
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'

]);

Route::post('/cart/checkout/', [
    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'

]);

Route::resource('products', 'ProductsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
