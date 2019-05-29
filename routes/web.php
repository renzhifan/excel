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

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::any('/export', 'GoodsController@export');

    Route::any('/importStep', 'GoodsController@importStep');
    Route::any('/importStep1', 'GoodsController@importStep1');
    Route::any('/importStep2', 'GoodsController@importStep2');
    Route::any('/importStep3', 'GoodsController@importStep3');
    Route::get('/home', 'HomeController@index')->name('home');

});

Route::get('/', function () {

    return view ('auth.login');
    return redirect('login');
});

Auth::routes();

