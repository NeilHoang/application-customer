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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('customer')->group(function () {
    Route::get('/', 'CustomerController@index')->name('customer.index');
    Route::get('create', 'CustomerController@create')->name('customer.create');
    Route::post('store', 'CustomerController@store')->name('customer.store');
    Route::get('{id}/destroy', 'CustomerController@destroy')->name('customer.delete');
    Route::get('{id}/edit', 'CustomerController@edit')->name('customer.edit');
    Route::post('{id}/update', 'CustomerController@update')->name('customer.update');
    Route::get('search','CustomerController@search')->name('customer.search');
});

Route::prefix('cities')->group(function () {
    Route::get('/','CitiesController@index')->name('cities.index');
    Route::get('create','CitiesController@create')->name('cities.create');
    Route::post('create','CitiesController@store')->name('cities.store');
    Route::get('{id}/delete','CitiesController@delete')->name('cities.delete');
    Route::get('{id}/edit','CitiesController@edit')->name('cities.edit');
    Route::post('{id}/update','CitiesController@update')->name('cities.update');
});
