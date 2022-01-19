<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('frontend');







// backend ROUTES

    // start login
    Route::group(["namespace" => "Auth"],function() {

        Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login')->name('login');

    });


    Route::middleware(['auth.fail:admin/login','admin.auth'])->group(function (){

        Route::group(["namespace" => "Dashboard"],function() {

            // start dashboard
            Route::get('admin', 'DashboardController@index')->name('admin');

            // all routes => dashboard
            Route::group(['name' => 'admin.',"prefix" => 'admin'],function () {

                // start Admin
                Route::resource('user',"UserController");

            });

        });

        // start logout
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    });
