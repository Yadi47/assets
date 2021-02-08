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

//Asset
Route::get('/all_assets', 'all_assetsController@index')->name('all_assets.home');
Route::get('/all_assets/add', 'all_assetsController@create')->name('all_assets.create');
Route::post('/all_assets/add', 'all_assetsController@store')->name('all_assets.store');
Route::get('/all_assets/gettree', 'all_assetsController@getTree')->name('all_assets.gettree');

// Category
 Route::get('/category', 'categoryController@index')->name('category.home'); 
 Route::get('/category/add', 'categoryController@create')->name('category.form');
 Route::get('/category/{id}/edit', 'categoryController@edit');
 Route::post('/category/store', 'categoryController@store')->name('category.store');
 Route::put('/category/{id}', 'categoryController@update')->name('category.update');
 Route::delete('/category/{id}', 'categoryController@destroy')->name('category.destroy');
 
 // Location
  Route::get('/location', 'locationController@index')->name('location.home'); 
  Route::get('/location/add', 'locationController@create')->name('location.form');
  Route::get('/location/{id}/edit', 'locationController@edit');
  Route::post('/location/store', 'locationController@store')->name('location.store');
  Route::put('/location/{id}', 'locationController@update')->name('location.update');
  Route::delete('/location/{id}', 'locationController@destroy')->name('location.destroy');

// Type
 Route::get('/unit', 'unitController@index')->name('unit.home');
 Route::get('/unit/add', 'unitController@create')->name('unit.form');
 Route::get('/unit/{id}/edit', 'unitController@edit');
 Route::post('/type/store', 'typeController@store')->name('type.store');
 Route::put('/type/{id}', 'typeController@update')->name('type.update');
 Route::delete('/type/{id}', 'typeController@destroy')->name('type.destroy');
 
 




























//Route::resource('/type', 'typeController');
// Route::get('/asset', 'AssetController@index');
// Route::get('/asset/create', 'AssetController@create');
// Route::get('/asset/{id}/edit', 'AssetController@edit');
// Route::post('/asset/store', 'AssetController@store')->name('asset.store');
// Route::put('/asset/{id}', 'AssetController@update')->name('asset.update');
// Route::delete('/asset/{id}', 'AssetController@destroy')->name('asset.delete');
