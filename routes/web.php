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
    return view('layouts.v_template');
});

// Route::get('/all_assets', 'all_assetsController@index')->name('all_assets.home');
Route::get('/category', 'categoryController@index')->name('category.home');



Route::get('/type', 'typeController@index')->name('type.home');
Route::get('/type/add', 'typeController@create')->name('type.form');
Route::post('/type/store', 'typeController@store')->name('type.store');
Route::DELETE('/type/delete', 'typeController@destroy')->name('type.destroy');

// Route::resource('/type', 'typeController');


Route::get('/location', 'locationController@index')->name('location.home');