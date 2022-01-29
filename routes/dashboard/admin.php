<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// backend ROUTES

// start login
Route::group(['namespace' => 'Auth'],function() {

    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('login');

});


Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::middleware(['auth','admin.auth'])->group(function (){

        Route::group(["namespace" => "Dashboard"],function() {

            // start dashboard
            Route::get('admin', 'DashboardController@index')->name('admin');

            // all routes => dashboard
            Route::group(['name' => 'admin.',"prefix" => 'admin'],function () {

                // start Admin
                Route::resource('users',"UserController")->except('show');

                // start Role
                Route::resource('roles',"RoleController");

                // start Category
                Route::resource('category',"CategoryController")->except(['show','edit','create']);

                // start subCategory
                Route::resource('subCategory',"SubCategoryController")->except(['show','edit','create']);
                Route::get('/categryselect/{id}', 'SubCategoryController@categryselect');

                // start product
                Route::resource('product',"ProductController")->except('show');
                Route::post('remove_feature','ProductController@remove_feature')->name('remove_feature');
                Route::post('remove_image','ProductController@remove_images')->name('remove_image');

                // start review
                Route::resource('review',"ReviewController");

            });

        });

    });

});

// start logout

Route::post('logout', 'Auth\LoginController@logout')->name('logout');