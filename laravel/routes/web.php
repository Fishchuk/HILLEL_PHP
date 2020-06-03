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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('/','Admin@index')->name('dashboard');
    Route::prefix('products')->name('products.')->group(function (){
        Route::put('create/{id}','ProductController@create')->name('create')->where(['id'=>'[0-9]+']);
        Route::get('/','ProductController@index')->name('index');
        Route::put('update/{id}','ProductController@update')->name('update')->where(['id'=>'[0-9]+']);
        Route::delete('delete/{id}','ProductController@delete')->name('delete')->where(['id'=>'[0-9]+']);
    });
    Route::prefix('orders')->name('orders.')->group(function (){
        Route::put('create/{id}','OrdersController@create')->name('create')->where(['id'=>'[0-9]+']);
        Route::get('/','OrdersController@index')->name('index');
        Route::put('update/{id}','OrdersController@update')->name('update')->where(['id'=>'[0-9]+']);
        Route::delete('delete/{id}','OrdersController@delete')->name('delete')->where(['id'=>'[0-9]+']);
    });
    Route::prefix('categories')->name('categories.')->group(function (){
        Route::put('create/{id}','CategoriesController@create')->name('create')->where(['id'=>'[0-9]+']);
        Route::get('/','CategoriesController@index')->name('index');
        Route::get('{id}/categories', 'CategoriesController@show')->name('show');
        Route::get('categories/{id}/edit', 'CategoriesController@edit')->name('edit')->where(['id'=>'[0-9]+']);
        Route::put('update/{id}','CategoriesController@update')->name('update')->where(['id'=>'[0-9]+']);
        Route::delete('delete/{id}','CategoriesController@delete')->name('delete')->where(['id'=>'[0-9]+']);
    });
    Route::prefix('users')->name('users.')->group(function (){
        Route::get('/','UsersController@index')->name('index');
        Route::get('{id}/users', 'UsersController@show')->name('show');
        Route::delete('delete/{id}','UsersController@delete')->name('delete')->where(['id'=>'[0-9]+']);
    });
});
