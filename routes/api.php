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


Route::get('get-users', 'App\Http\Controllers\User\Main\UserController@index');
Route::get('get-user-categories', 'App\Http\Controllers\User\Main\UserCategoryController@index');
Route::post('create-user', 'App\Http\Controllers\User\Main\UserController@store');
Route::put('edit-user/{id}', 'App\Http\Controllers\User\Main\UserController@updateUser');
Route::delete('delete-user/{id}', 'App\Http\Controllers\User\Main\UserController@destroy');


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
