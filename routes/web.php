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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/user', 'FrontAuthController@check_login')->name('login.check_login');

Route::post('/register/user', 'FrontAuthController@store')->name('register.store');

Route::namespace("Admin")->prefix('admin')->group(function () {

    Route::get('/dashboard', 'AdminHomeController@index')->name('admin.home');

    Route::resource('permissions', 'PermissionController')->middleware('role:super-admin');
    Route::resource('roles', 'RoleController')->middleware('role:super-admin');
    Route::resource('users', 'UserController')->middleware('role:super-admin|admin');

    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');

    Route::resource('orders', 'OrderController');

    Route::namespace('Auth')->group(function () {
        Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'AdminLoginController@login');
        Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');
    });





});
