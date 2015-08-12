<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('client', 'ClientsController@index');
Route::post('client', 'ClientsController@store');
Route::get('client/{id}', 'ClientsController@show');
Route::put('client/{id}', 'ClientsController@update');
Route::delete('client/{id}', 'ClientsController@destroy');
