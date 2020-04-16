<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::get('/profile/{id}', "ProfileController@show")->name("profile.show");
Route::get('/edit/{id}', "ProfileController@edit")->name("edit.profile");
Route::post('/edit/{id}', "ProfileController@update")->name("update.profile");
Route::get('/changePassword/{id}', "ProfileController@showPassword")->name("show.password");
Route::post('/changePassword/{id}', "ProfileController@changePassword")->name("change.password");
