<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Auth\RegisterController@create');

Route::post('login', 'Backend\AuthController@login');
Route::post('logout', 'Backend\AuthController@logout');
Route::post('refresh', 'Backend\AuthController@refresh');
Route::post('me', 'Backend\AuthController@me');

Route::group(['middleware' => ['jwt.auth']], function (){
    /* Lots */
    Route::resource('lots', 'Backend\LotsController');
    Route::get('/', 'Backend\LotsController@all');
    Route::get('user/{user}/lots', 'Backend\LotsController@list');
    /* Bets */
    Route::get('/lots/{lot}/bet', 'Backend\BetsController@bet');
});
