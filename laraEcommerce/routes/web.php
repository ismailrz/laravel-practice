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


Route::get('/','Frontend\pagesController@index')->name('index');
Route::get('/contact','Frontend\pagesController@contact')->name('contact');


// product Routes
    Route::group(['prefix'=>'products'], function(){

      Route::get('/','Frontend\productsController@index')->name('products');
      Route::get('/{slug}','Frontend\productsController@show')->name('products.show');
      Route::get('/search','Frontend\pagesController@search')->name('search');


      //Categories Routes

      Route::get('/categories','Frontend\categoriesController@index')->name('categories.index');
      Route::get('/category/{id}','Frontend\categoriesController@category')->name('categories.show');
      });
  // Admin Route
Route::group(['prefix'=>'admin'], function(){
    Route::get('/','backend\pagesController@index')->name('admin.index');

    // product Route
    Route::group(['prefix'=>'/products'], function(){

      Route::get('/','backend\productsController@index')->name('admin.products');
      Route::get('/create','backend\ProductsController@create')->name('admin.product.create');
      Route::get('/edit/{id}','backend\ProductsController@edit')->name('admin.product.edit');
      Route::post('/store','backend\ProductsController@store')->name('admin.product.store');

      Route::post('/product/edit/{id}','backend\ProductsController@update')->name('admin.product.update');
      Route::post('/product/delete/{id}','backend\ProductsController@delete')->name('admin.product.delete');
    });

    // Category Route
    Route::group(['prefix'=>'/Categories'], function(){

      Route::get('/','backend\CategoriesController@index')->name('admin.Categories');
      Route::get('/edit/{id}','backend\CategoriesController@edit')->name('admin.category.edit');
      Route::get('/create','backend\CategoriesController@create')->name('admin.category.create');
      Route::post('/store','backend\CategoriesController@store')->name('admin.category.store');

      Route::post('/category/edit/{id}','backend\CategoriesController@update')->name('admin.category.update');
      Route::post('/category/delete/{id}','backend\CategoriesController@delete')->name('admin.category.delete');
    });


    // Brands Route
    Route::group(['prefix'=>'/brands'], function(){

      Route::get('/','backend\brandsController@index')->name('admin.brands');
      Route::get('/edit/{id}','backend\brandsController@edit')->name('admin.brand.edit');
      Route::get('/create','backend\brandsController@create')->name('admin.brand.create');
      Route::post('/store','backend\brandsController@store')->name('admin.brand.store');

      Route::post('/brand/edit/{id}','backend\brandsController@update')->name('admin.brand.update');
      Route::post('/brand/delete/{id}','backend\brandsController@delete')->name('admin.brand.delete');
    });

});
