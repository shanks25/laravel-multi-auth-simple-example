<?php
use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login');
    Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', 'AdminProfileController@index');
        Route::get('/users', 'UserController@index');
        Route::get('/users/create', 'UserController@create');
        Route::post('/users/store', 'UserController@store');
        Route::get('/users/edit/{id}', 'UserController@edit');
        Route::post('/users/update/{id}', 'UserController@update');
        Route::get('users/delete/{id}', 'UserController@destroy');
    });
});
