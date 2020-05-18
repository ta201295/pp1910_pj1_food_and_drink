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

    Route::group(['as' => 'products.', 'prefix' => '/products'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/create', 'ProductController@store');
        Route::get('/{product_slug}/edit', 'ProductController@edit')->name('edit');
        Route::post('/{product_slug}/update', 'ProductController@update')->name('update');
        Route::get('/{product_id}/delete', 'ProductController@destroy')->name('delete');
    });

    Route::group(['as' => 'categories.', 'prefix' => '/categories'], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/create', 'CategoryController@store');
        Route::get('/{category_id}/edit', 'CategoryController@edit')->name('edit');
        Route::post('/{category_id}/update', 'CategoryController@update')->name('update');
        Route::get('/{category_id}/delete', 'CategoryController@destroy')->name('delete');
    });
});