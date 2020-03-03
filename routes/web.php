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
Route::redirect('/','/items'); 
Route::get('list/index','ListController@index');
Route::post('list/update-order','ListController@updateOrder'); 
Route::resource('items', 'ItemsController');
