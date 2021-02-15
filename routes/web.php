<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('home');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('formForProduct');
Route::get('/products/{product}', 'App\Http\Controllers\ProductController@show')->name('showProduct');
Route::post('/products/store', 'App\Http\Controllers\ProductController@store')->name('createProduct');
Route::get('/products/{product}/edit', 'App\Http\Controllers\ProductController@edit')->name('editProduct');
Route::post('/products/update', 'App\Http\Controllers\ProductController@update')->name('updateProduct');
