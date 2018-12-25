<?php

Route::get('/index', 'IndexController@index')->middleware('auth');
Route::post('/index', 'IndexController@store')->middleware('auth');
Route::get('/schedule/edit/{id}', 'IndexController@edit')->middleware('auth');
Route::post('/schedule/edit', 'IndexController@update')->middleware('auth');
Route::post('/schedule/delete', 'IndexController@destroy')->middleware('auth');

Auth::routes();
