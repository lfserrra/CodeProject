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

Route::group(['prefix' => 'client'], function ()
{
    Route::get('', 'ClientsController@index');
    Route::post('', 'ClientsController@store');
    Route::get('{id}', 'ClientsController@show');
    Route::put('{id}', 'ClientsController@update');
    Route::delete('{id}', 'ClientsController@destroy');
});

Route::group(['prefix' => 'project'], function ()
{
    Route::group(['prefix' => '{id}/note'], function ()
    {
        Route::get('', 'ProjectNotesController@index');
        Route::post('', 'ProjectNotesController@store');
        Route::get('{noteId}', 'ProjectNotesController@show');
        Route::put('{noteId}', 'ProjectNotesController@update');
        Route::delete('{noteId}', 'ProjectNotesController@destroy');
    });

    Route::get('', 'ProjectsController@index');
    Route::post('', 'ProjectsController@store');
    Route::get('{id}', 'ProjectsController@show');
    Route::put('{id}', 'ProjectsController@update');
    Route::delete('{id}', 'ProjectsController@destroy');
});
