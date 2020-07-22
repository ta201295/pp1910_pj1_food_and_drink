<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::get('/logout', 'LogoutController@logout')->name('logout');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/index', 'HomeController@index')->name('index');
    });

    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::group(['as' => 'orders.', 'prefix' => '/orders'], function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/{order}/delete', 'OrderController@destroy')->name('delete');
    });
});
