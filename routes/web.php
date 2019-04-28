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

Route::get('/form', function () {
    return view('form');
});
Route::get('/', function () {
    return view('welcome');
});
Route::any('/export','GoodsController@export');
Route::any('/import','GoodsController@import');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
