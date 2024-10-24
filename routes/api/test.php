<?php
use \App\Http\Controllers\Api\V2\TestController;


Route::middleware("auth:sanctum")->prefix('test')->group(function (){

    Route::post('index',[TestController::class,'index']);

    Route::post('xml2json',[TestController::class,'xmlToJson']);

    Route::post('json2xml',[TestController::class,'jsonToXml']);

    Route::post('map',[TestController::class,'mapGateway']);



});


