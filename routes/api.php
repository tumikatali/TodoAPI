<?php

use Illuminate\Http\Request;
Use App\Task;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tasks', 'TaskController@index');

Route::get('tasks/{task}', 'TaskController@show');

Route::post('task', 'TaskController@store');

Route::put('tasks/{task}', 'TaskController@update');

Route::delete('task/{id}/delete', 'TaskController@destroy');

Route::get("tasks/{id}/complete", "TaskController@complete");