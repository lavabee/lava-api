<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logs', function () {
    $path = storage_path('logs/laravel.log'); // Đường dẫn đến file log
    if (File::exists($path)) {
        $logs = File::get($path);
        // Tách các dòng log
        $logLines = explode("\n", $logs);
        // Giới hạn số dòng log (ví dụ: chỉ hiển thị 100 dòng cuối)
        $logLines = array_slice($logLines, -100);
        // Hiển thị log dưới dạng HTML với các dòng mới
        return nl2br(implode("\n", $logLines));
    } else {
        return 'Log file does not exist.';
    }
});
