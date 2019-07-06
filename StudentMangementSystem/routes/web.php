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

//Route::get('/','StudentController@index');
Route::get('/tr', function () {
    return view('welcome');
});

Route::get('/','StudentController@index')->name('index');
Route::get('/view','StudentController@view')->name('view');
Route::get('/edit/{id}','StudentController@edit')->name('edit');


route::post('/store','StudentController@store')->name('store');
route::post('/update/{id}','StudentController@update')->name('update');
route::post('/delete/{id}','StudentController@delete')->name('delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
