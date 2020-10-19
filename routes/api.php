<?php

use App\Http\Controllers\API\TodoAPI;
use App\Http\Controllers\API\UserAPI;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::patch('todo/done/{id}',[TodoAPI::class,"done"]);
Route::patch('todo/recover/{id}',[TodoAPI::class,"recover"]);

Route::apiResource('todo',TodoAPI::class);
//Route::get('/todo/{id}',[TodoAPI::class,'show']);

//user api
Route::get("/users",[UserAPI::class,"index"]);
