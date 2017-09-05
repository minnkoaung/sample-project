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

// Route::get('/', function () {
// 	return view('welcome');
// });
Route::get('/', 'PagesController@index');
Route::get('/test', 'TestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//widget route
// Route::resource('widget', 'WidgetController');

// Widget routes
Route::get('widget/create', 'WidgetController@create')->name('widget.create');
// Route::get('widget/{id}-{slug?}', 'WidgetController@show')->name('widget.show');
//Route with automatic route-model-binding
Route::get('widget/{widget}-{slug?}','WidgetController@show')->name('widget.show'); 
Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);

//Cateogry routes
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::get('category/{category}-{slug?}','CategoryController@show')->name('category.show'); 
Route::resource('category', 'CategoryController', ['except' => ['show', 'create']]);

//Admin routes
Route::get('/admin', 'AdminController@index')->name('admin');
