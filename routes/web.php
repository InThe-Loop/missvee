<?php

use App\CountryVisit;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FaceBookController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// home page
Route::get('/', 'WelcomePageController@index')->name('welcome');

// About us
Route::get('/about-us', 'AboutController@index')->name('about');

// Terms
Route::get('/policies/{page}', 'PoliciesController@index')->name('policies');

// Contact us
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/send', 'ContactController@sendContactEmail')->name('sendmail');

// For hire
Route::get('/hire', 'HireController@index')->name('hire');
Route::post('/reservations/place', 'HireController@reservation')->name('reserve');
Route::get('/reservations/fetch/{id}', 'HireController@fetchItem')->name('fetch');

// Shop links
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

// Voyager visitors
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/country_visits', 'VisitsController@index')->name('voyager.visits');
});

// Log viewer
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('admin');

// Auth routes
Auth::routes();
Auth::routes(['verify' => true]);

// Facebook Login URL
Route::prefix('login/facebook')->name('facebook.login')->group( function() {
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

// Google URL
Route::prefix('login/google')->name('google.login')->group( function() {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
