<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/', 'ProductController@index')->name('index');
Route::get('/inventory', 'ProductController@show')->name('inventory')->middleware('auth');
Route::get('/inventory/create', 'ProductController@create')->middleware('auth');
Route::post('/inventory/store', 'ProductController@store')->name('product.store');
Route::get('/inventory/{id}/edit', 'ProductController@edit')->middleware('auth');
Route::put('/inventory/{id}/edit', 'ProductController@update')->middleware('auth');
Route::delete('/delete/{id}', 'ProductController@destroy')->name('inventory.destroy')->middleware('auth');
Route::get('/product/{id}', 'ProductController@get')->name('get.product');


// Cart Routes
route::get ('/cart', 'CartController@index')->name('cart.index');
Route::get('/add-to-cart', 'CartController@add')->name('cart.add');
Route::get('/cart/destroy/{item}', 'CartController@destroy')->name('cart.destroy');
// Route::get('/checkout/bank', 'CartController@checkout');
// Route::get('/checkout/paypal', 'CartController@checkout');
Route::get('/checkout/{type}', 'CartController@checkout')->name('cart.checkout');
Route::get('/cart/applyCoupon','CartController@applyCoupon')->name('cart.apply');


Route::resource('orders', 'OrderController');

route::get('paypal/checkout/{order}', 'PaypalController@getExpressCheckout')->name('paypal.checkout');
route::get('paypal/checkout-success/{order}', 'PaypalController@getExpressCheckoutSuccess')->name('paypal.success');
route::get('paypal/checkout-cancel', 'PaypalController@cancelPage')->name('paypal.cancel');

route::get('order/success/{order}', 'OrderController@show')->name('order.success');

/* Socialite Routes */
/* Github */
route::get('/sign-in/github', 'Auth\LoginController@github');
route::get('/sign-in/github/redirect', 'Auth\LoginController@githubRedirect');
/* facebook */
route::get('/sign-in/facebook', 'Auth\LoginController@facebook');
route::get('/sign-in/facebook/redirect', 'Auth\LoginController@facebookRedirect');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


