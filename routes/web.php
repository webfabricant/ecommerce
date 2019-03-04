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
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);

Route::get('/product/{id}', [

    'uses' => 'FrontendController@singleProduct',
    'as' => 'product.single'

]);

Route::post('/cart/add', [
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart', [

    'uses' => 'ShoppingController@cart',
    'as' => 'cart'

]);

Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/cart/increase/{id}/{qty}', [

    'uses' => 'ShoppingController@increase',
    'as' => 'cart.increase'

]);

Route::get('/cart/reduce/{id}/{qty}', [

    'uses' => 'ShoppingController@reduce',
    'as' => 'cart.reduce'

]);

Route::get('cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/checkout', [

    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'

]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/product', 'ProductsController');

// Route::get('/product/create', [

//     'uses' => 'ProductsController@create',
//     'as' => 'product.create'

// ]);

// Route::post('/product/store', [

//     'uses' => 'ProductsController@store',
//     'as' => 'product.store'

// ]);
