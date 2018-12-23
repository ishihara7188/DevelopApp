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




Route::get('/index', 'IndexController@index')->middleware('auth');
Route::post('/index', 'IndexController@store')->middleware('auth');
Route::get('/schedule/edit', 'IndexController@edit')->middleware('auth');
Route::post('/schedule/edit', 'IndexController@update')->middleware('auth');
Route::post('/schedule/delete', 'IndexController@destroy')->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
