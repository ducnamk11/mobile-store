<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontendController@home');
Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
Route::get('search', 'FrontendController@getSearch');
Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', 'CartController@getAddCart');
    Route::get('show', 'CartController@getShowCart');
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    Route::get('update', 'CartController@getUpdateCart');
    Route::post('show', 'CartController@postComplete');

});
Route::get('complete', 'CartController@getComplete');

Route::group(['namespace' => 'Admin'], function () {
    /*
     * LogiN*/
    Route::group(['prefix' => 'login', 'middleware'=>'CheckLogedIn'], function () {
        Route::get('/', 'LoginController@getLogin');
        Route::post('/', 'LoginController@postLogin');

    });
    /*
     * Logout*/
    Route::get('logout', 'HomeController@getLogout');
    Route::group(['prefix' => 'admin', 'middleware'=>'CheckLogedOut'], function () {
        Route::get('home', 'HomeController@getHome');
        Route::group(['prefix' => 'category', 'middleware'=>'CheckLogedOut'], function () {
            Route::get('/', 'CategoryController@getCategory');
            Route::post('/', 'CategoryController@postCategory');

            Route::get('edit/{id}', 'CategoryController@getEditCategory');
            Route::post('edit/{id}', 'CategoryController@postEditCategory');

            Route::get('delete/{id}', 'CategoryController@getDeleteCategory');
        });
        Route::group(['prefix' => 'product', 'middleware'=>'CheckLogedOut'], function () {
            Route::get('/', 'ProductController@getProduct');

            Route::get('add', 'ProductController@getAddProduct');
            Route::post('add', 'ProductController@postAddProduct');

            Route::get('edit/{id}', 'ProductController@getEditProduct');
            Route::post('edit/{id}', 'ProductController@postEditProduct');

            Route::get('delete/{id}', 'ProductController@getDeleteProduct');
        });
    });
 });
