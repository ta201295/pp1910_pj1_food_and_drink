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

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/users/register', 'RegisterController@showRegistrationForm')->name('register');;
    Route::post('/users/register', 'RegisterController@register');
    Route::get('/users/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/users/login', 'LoginController@login');
    Route::get('/users/logout', 'LogoutController@logout')->name('logout');
    Route::post('/account/password', 'ChangePasswordController@change')->name('change_password');
    Route::get('/account/password', 'ChangePasswordController@index')->name('change_password');
    Route::get('login/{provider}', 'LoginController@redirectToProvider');
    Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback');

});

Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/account', 'AccountController@index')->name('account');
    Route::get('/account/edit-profile', 'AccountController@editProfile')->name('edit_profile');
    Route::post('/account/edit-profile', 'AccountController@updateProfile')->name('update_profile');
    Route::get('/account/my-order', 'AccountController@myOrder')->name('myOrder');

    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::post('/contact', 'HomeController@contactSend');

    Route::get('/products', 'ProductController@index')->name('product');
    Route::get('/product-of-category/{id}', 'ProductController@filterByCategory')->name('productcategory');
    Route::get('/product/{slug}', 'ProductController@show')->name('product_detail');
    Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product_addToCart');
    Route::get('/shopping-cart', 'ProductController@getCart')->name('product_cart');
    Route::get('/del-cart/{id}', 'ProductController@getDelItemCart')->name('product_delCart');
    Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
    Route::post('/checkout', 'ProductController@postCheckout')->name('checkout');
    Route::get('/search', 'ProductController@search')->name('search');
    Route::post('/review', 'ProductReviewController@store')->name('review');

    Route::group(['middleware' => 'localization'], function() {
        Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('change-language');
    });
});
