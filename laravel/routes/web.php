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
/*Route::middleware('auth','admin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('/','Admin@index')->name('dashboard');
    Route::prefix('products')->name('products.')->group(function (){
        Route::put('/{id}','ProductController@create')->name('create');
        Route::get('/','ProductController@index')->name('index');
        Route::post('/','ProductController@store')->name('store');
        Route::put('/{id}','ProductController@update')->name('update');
        Route::delete('/{id}','ProductController@destroy')->name('destroy');
    });
    Route::prefix('orders')->name('orders.')->group(function (){
        Route::put('/{id}','OrdersController@create')->name('create');
        Route::get('/','OrdersController@index')->name('index');
        Route::post('/','OrdersController@store')->name('store');
        Route::put('/{id}','OrdersController@update')->name('update');
        Route::delete('/{id}','OrdersController@destroy')->name('destroy');
    });
    Route::prefix('categories')->name('categories.')->group(function (){
        Route::put('/{id}','CategoriesController@create')->name('create');
        Route::get('/','CategoriesController@index')->name('index');
        Route::post('/', 'CategoriesController@show')->name('store');
        Route::get('/{id}/edit', 'CategoriesController@edit')->name('edit');
        Route::put('/{id}','CategoriesController@update')->name('update');
        Route::delete('/{id}','CategoriesController@destroy')->name('destroy');
    });
    Route::prefix('users')->name('users.')->group(function (){
        Route::get('/','UsersController@index')->name('index');
        Route::get('{id}', 'UsersController@show')->name('show');
        Route::delete('/{id}','UsersController@destroy')->name('destroy');
    });
});
*/
