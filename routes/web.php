<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@inicio')->name('inicio');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
