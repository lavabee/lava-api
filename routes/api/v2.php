<?php
use App\Http\Controllers\Api\V2\TaskController;
use App\Http\Controllers\Api\V2\CompleteTaskController;
use \App\Http\Controllers\Api\V2\TestController;

Route::middleware("auth:sanctum")->prefix('v2')->group(function (){

    Route::apiResource("tasks", TaskController::class);
    Route::patch("tasks/{task}/complete", CompleteTaskController::class);




    //test
    Route::post('xml2json',[TestController::class,'xmlToJson']);
});
