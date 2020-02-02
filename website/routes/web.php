<?php

Auth::routes();

Route::get('/home', function() { return redirect()->route('home'); });
Route::get('/', 'HomeController@index')->name('home');

Route::get('/menu', 'MenuController@index')->name('menu');

// Route::get('/aanbiedingen', 'AanbiedingenController@index')->name('aanbiedingen');

Route::get('/winkelmandje', 'MandjeController@index')->name('cart');
Route::get('/winkelmandje/add/{id}', 'MandjeController@store')->name('cart.add');
Route::get('/winkelmandje/delete/{id}', 'MandjeController@delete')->name('cart.delete');

Route::get('/location', 'LocationController@show')->name('location');
Route::post('/paymethod', 'Paymethod@show')->name('paymethod');

Route::get('/account', 'AccountController@show')->name('account.show'); /* === Account === */
Route::post('/account', 'AccountController@edit')->name('account.edit');

Route::prefix('admin')->group(function() {
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', function() { return redirect()->route('admin.index'); });

        Route::get('', 'AdminController@index')->name('admin.index');

        Route::post('/store', 'ProductController@store')->name('admin.store');
        Route::post('/delete', 'ProductController@delete')->name('admin.delete');
    });

    Route::get('/login', 'Auth\AdminloginController@show')->name('admin.login');
    Route::post('/login', 'Auth\AdminloginController@login')->name('admin.login.submit');
});