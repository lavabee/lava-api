<?php
use App\Http\Controllers\Api\V2\TaskController;
use App\Http\Controllers\Api\V2\CompleteTaskController;

Route::middleware("auth:sanctum")->prefix('test')->group(function (){

    Route::post('/xml2json',[\App\Http\Controllers\Api\V2\TestController::class,'xmlToJson']);



});
