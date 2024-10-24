<?php
use \App\Http\Controllers\Api\V2\TestController;


Route::middleware("auth:sanctum")->prefix('test')->group(function (){

    Route::post('index',[TestController::class,'index']);

    Route::post('xml2json',[TestController::class,'xmlToJson']);

    Route::post('json2xml',[TestController::class,'jsonToXml']);

    Route::post('map',[TestController::class,'mapGateway']);

    Route::get('/logs', function () {
        $path = storage_path('logs/laravel.log'); // Đường dẫn đến file log
        if (File::exists($path)) {
            $logs = File::get($path);
            return nl2br($logs); // Chuyển đổi ký tự xuống dòng thành thẻ <br> để hiển thị đúng trên trình duyệt
        } else {
            return 'Log file does not exist.';
        }
    });

});
