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

Route::prefix('/products')->group(function ()
{
    Route::get('/', 'App\Http\Controllers\ProductController@index')->name('home');
    Route::post('/', 'App\Http\Controllers\ProductController@store')->name('createProduct');
    Route::get('/create', 'App\Http\Controllers\ProductController@create')->name('formForProduct');
    Route::get('/{product}', 'App\Http\Controllers\ProductController@show')->name('showProduct');

    Route::get('/{product}/edit', 'App\Http\Controllers\ProductController@edit')->name('editProduct');
    Route::put('/{product}', 'App\Http\Controllers\ProductController@update')->name('updateProduct');
    Route::delete('/{product}','App\Http\Controllers\ProductController@destroy')->name('deleteProduct');
});

