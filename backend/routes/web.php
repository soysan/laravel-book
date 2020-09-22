<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'ReviewController@index')->name('index');

Auth::routes();

Route::get('/show/{id}', 'ReviewController@show')->name('show');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/review', 'ReviewController@create')->name('create');
    Route::post('/review', 'ReviewController@store')->name('store');

});

Route::get('/home', 'HomeController@index')->name('home');
