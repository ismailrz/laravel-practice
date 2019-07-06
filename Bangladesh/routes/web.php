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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/','BangladeshController@index')->name('index');
Route::get('/show','BangladeshController@show')->name('show');
Route::get('/edit/{id}','BangladeshController@edit')->name('edit');

Route::post('/store','BangladeshController@store')->name('store');
Route::post('/update/{id}','BangladeshController@update')->name('update');
Route::post('/delete/{id}','BangladeshController@delete')->name('delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
