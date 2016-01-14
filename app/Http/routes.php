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
    return view('app');
});

Route::post('oauth/access_token', function ()
{
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function ()
{

    Route::resource('client', 'ClientsController', ['except' => ['create', 'edit']]);

    Route::resource('project', 'ProjectsController', ['except' => ['create', 'edit']]);
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

        Route::group(['prefix' => '{id}/task'], function ()
        {
            Route::get('', 'ProjectTasksController@index');
            Route::post('', 'ProjectTasksController@store');
            Route::get('{taskId}', 'ProjectTasksController@show');
            Route::put('{taskId}', 'ProjectTasksController@update');
            Route::delete('{taskId}', 'ProjectTasksController@destroy');
        });

        Route::group(['prefix' => '{id}/members'], function ()
        {
            Route::get('', 'ProjectsController@members');
            Route::post('{userId}', 'ProjectsController@addMember');
            Route::delete('{membersId}', 'ProjectsController@removeMember');
            Route::get('{userId}/isMember', 'ProjectsController@isMember');
        });

        Route::group(['prefix' => '{id}/file'], function ()
        {
            Route::get('', 'ProjectFilesController@index');
            Route::post('', 'ProjectFilesController@store');
            Route::get('{fileId}', 'ProjectFilesController@show');
            Route::delete('{fileId}', 'ProjectFilesController@destroy');
        });
    });
});