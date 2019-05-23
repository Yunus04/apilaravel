<?php

use Illuminate\Http\Request;

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
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::get('users', 'UserController@users');
Route::get('users/profile', 'UserController@profile')->middleware('auth:api');
Route::get('users/{id}', 'UserController@profileById')->middleware('auth:api');
Route::post('item', 'ItemController@add')->middleware('auth:api');
Route::put('item/{item}', 'ItemController@update')->middleware('auth:api');
Route::delete('item/{item}', 'ItemController@delete')->middleware('auth:api');