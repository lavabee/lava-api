<?php

use Illuminate\Support\Facades\Route;

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
        return nl2br($logs); // Chuyển đổi ký tự xuống dòng thành thẻ <br> để hiển thị đúng trên trình duyệt
    } else {
        return 'Log file does not exist.';
    }
});


