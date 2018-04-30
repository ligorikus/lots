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

Route::group(['middleware' => ['jwt.auth']], function (){
    Route::get('/', 'LotsController@all');
    Route::get('user/{user}/lots', 'LotsController@list');
    Route::resource('lots', 'LotsController');
});
