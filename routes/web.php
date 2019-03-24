<?php

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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')
    ->name('password.update');

Route::namespace("Admin\\")->prefix('admin')->name('admin.')->group(function () {

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    Route::middleware('can:auth-admin')->group(function () {

        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::name('dashboard')->get('/dashboard', function () {
            return view('admin.dashboard');
        });

        Route::resource('users', 'UsersController');

    });


});

Route::get('/force-login', function () {
   Auth::loginUsingId(1);
});
