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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.welcome');
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/home/create/{id}', 'HomeController@create')->name('home.create');
Route::post('/home/store', 'HomeController@store')->name('home.store');
Route::get('/home/status/{code}/{id}', 'HomeController@verifyStatus')->name('home.status');

Route::get('/migration', 'MigrationController@index')->name('migration.index');
Route::post('/migration/create', 'MigrationController@create')->name('migration.create');

Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/sale', 'SaleController@index')->name('sale.index');
Route::get('/sale/destroy/{id}', 'SaleController@destroy')->name('sale.destroy');

Route::get('/message', 'MessageController@index')->name('message.index');
Route::get('/message/{id}/{status}', 'MessageController@update')->name('message.update.status');

Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::get('/product/show/{id}/{sale_id}', 'ProductController@show')->name('product.show');
Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');

