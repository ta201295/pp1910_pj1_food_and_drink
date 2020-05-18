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

    Route::group(['as' => 'users.', 'prefix' => '/users'], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/create', 'UserController@store');
        Route::get('/{user_id}/edit', 'UserController@edit')->name('edit');
        Route::post('/{user_id}/update', 'UserController@update')->name('update');
        Route::get('/{user_id}/delete', 'UserController@destroy')->name('delete');
    });

    // Route::group(['as' => 'products.', 'prefix' => '/products'], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    // });
});