<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks', 'App\Http\Controllers\TaskController@index'); //mostrar tarea
Route::post('/tasks', 'App\Http\Controllers\TaskController@store'); //crear una tarea
Route::put('/tasks/{id}', 'App\Http\Controllers\TaskController@update'); //actualizar tarea
Route::delete('/tasks/{id}', 'App\Http\Controllers\TaskController@destroy'); //eliminar tarea
Route::put('/tasks/updatecheckstatus/{id}', 'App\Http\Controllers\TaskController@updatecheckstatus'); //actualizar check de tarea


Route::get('/contacts', 'App\Http\Controllers\ContactController@index'); //mostrar Formulario
Route::post('/contacts', 'App\Http\Controllers\ContactController@store'); //crear Formulario de Contacto




