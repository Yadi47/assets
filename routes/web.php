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
Route::get('/category/add', 'typeController@create')->name('type.form');
 Route::get('/type/{id}/edit', 'typeController@edit');
 Route::post('/type/store', 'typeController@store')->name('type.store');
 Route::put('/type/{id}', 'typeController@update')->name('type.update');
 Route::delete('/type/{id}', 'typeController@destroy')->name('type.destroy');


// Type
 Route::get('/type', 'typeController@index')->name('type.home');
 Route::get('/type/add', 'typeController@create')->name('type.form');
 Route::get('/type/{id}/edit', 'typeController@edit');
 Route::post('/type/store', 'typeController@store')->name('type.store');
 Route::put('/type/{id}', 'typeController@update')->name('type.update');
 Route::delete('/type/{id}', 'typeController@destroy')->name('type.destroy');
 
 Route::get('/location', 'locationController@index')->name('location.home');
 




























//Route::resource('/type', 'typeController');
// Route::get('/asset', 'AssetController@index');
// Route::get('/asset/create', 'AssetController@create');
// Route::get('/asset/{id}/edit', 'AssetController@edit');
// Route::post('/asset/store', 'AssetController@store')->name('asset.store');
// Route::put('/asset/{id}', 'AssetController@update')->name('asset.update');
// Route::delete('/asset/{id}', 'AssetController@destroy')->name('asset.delete');
