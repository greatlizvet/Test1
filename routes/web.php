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

/*Route::get('/', 'MovieController@index');
Route::get('/create', 'MovieController@create');
Route::get('/edit/{id}', 'MovieController@edit');
Route::get('/show/{id}', 'MovieController@show');

Route::post('/store', 'MovieController@store');
Route::post('/update', 'MovieController@update');
*/

Route::get('/', 'PastaController@index');
Route::get('/create', 'PastaController@create');
Route::get('/{hash}', 'PastaController@show');

Route::post('/store', 'PastaController@store');