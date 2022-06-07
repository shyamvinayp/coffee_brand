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

Route::get('/', function ($locale = 'en') {
   app()->setLocale($locale);
    session()->put('locale', $locale);
    return Redirect::to('login');
});

Route::get('/admin','AdminController@index');
Auth::routes();

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

// forgot password
Route::get('/forget-password', 'ForgotPasswordController@getEmail');
Route::post('/forget-password', 'ForgotPasswordController@postEmail')->name('forget-password');

// reset password
Route::get('/reset-password/{token}', 'ResetPasswordController@getPassword');
Route::post('/reset-password', 'ResetPasswordController@updatePassword')->name('reset-password');;
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

//User routings
Route::get('users', 'UsersController@index')->name('users.index');
Route::get('/users/home', 'UsersController@home')->name('users.home');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::post('/users/{user}/update', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

//Coffee brands routings
Route::get('cbrands', 'CoffeeBrandsController@index')->name('cbrands.index');
Route::get('cbrands/{coffee}/view', 'CoffeeBrandsController@view')->name('cbrands.view');
Route::get('/cbrands/create', 'CoffeeBrandsController@create')->name('cbrands.create');
Route::post('/cbrands/store', 'CoffeeBrandsController@store')->name('cbrands.store');
Route::delete('/cbrands/{coffee}', 'CoffeeBrandsController@destroy')->name('cbrands.destroy');
Route::post('/cbrands/vote', 'CoffeeBrandsController@vote')->name('cbrands.vote');
