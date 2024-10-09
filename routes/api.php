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

require __DIR__."/api/v1.php";
require __DIR__."/api/v2.php";
require __DIR__."/api/test.php";



Route::prefix("auth")->group(function(){
    Route::post('/login', \App\Http\Controllers\Api\Auth\LoginControler::class);
    Route::post('/logout', \App\Http\Controllers\Api\Auth\LogoutController::class)->middleware('auth:sanctum');
    Route::post('/register', \App\Http\Controllers\Api\Auth\RegisterController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
