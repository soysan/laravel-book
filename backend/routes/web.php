<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'ReviewController@index')->name('index');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/review', 'ReviewController@create')->name('create');
    
});

Route::get('/home', 'HomeController@index')->name('home');
