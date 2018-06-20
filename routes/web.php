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

Route::get('/', 'Frontend\LotsController@index');

Route::get('/', 'Frontend\LotsController@all');
Route::resource('lots', 'Frontend\LotsController');

Route::get('/user/{user}', 'Frontend\UserController@index');


Route::get('signin', 'Frontend\AuthController@signin');
Route::get('signup', 'Frontend\AuthController@signup');
Route::get('logout', 'Frontend\AuthController@logout');