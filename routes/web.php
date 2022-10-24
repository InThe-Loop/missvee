<?php

use App\CountryVisit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

// home page
Route::get('/', 'WelcomePageController@index')->name('welcome');

// About us
Route::get('/about-us', 'AboutController@index')->name('about');

// Contact us
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/send', 'ContactController@sendContactEmail')->name('sendmail');

// Shop links
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/shop/search/{query}', 'ShopController@search')->name('shop.search');

// Cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}/{cart}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/save-later/{product}', 'CartController@saveLater')->name('cart.save-later');
Route::post('/cart/add-to-cart/{product}', 'CartController@addToCart')->name('cart.add-to-cart');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

// Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/guest-checkout', 'CheckoutController@index')->name('checkout.guest');

// Coupon
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon/', 'CouponsController@destroy')->name('coupon.destroy');

// Auth routes
Auth::routes();
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Voyager visitors
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/country_visits', 'VisitsController@index')->name('voyager.visits');
});

// Log viewer
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('admin');
