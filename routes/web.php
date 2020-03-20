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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Route::get('/day', ['as' => 'day', 'uses' => 'HomeController@day']);
Route::get('/show/{date}', ['as' => 'day', 'uses' => 'HomeController@dayShow']);
Route::post('/store', ['as' => 'store', 'uses' => 'HomeController@store']);
Route::post('/visitors', ['as' => 'visitors', 'uses' => 'HomeController@showSessions']);



Route::resource('date', 'DateController');


