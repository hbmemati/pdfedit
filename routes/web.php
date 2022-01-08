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
Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::get('/pdfedit', [\App\Http\Controllers\PdfController::class, 'pdfedit'])->name('pdfedit');
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');


    Route::get('/active', [\App\Http\Controllers\LoginController::class, 'active'])->name('active');
    Route::get('/passive', [\App\Http\Controllers\LoginController::class, 'passive'])->name('passive');
    Route::get('/delete', [\App\Http\Controllers\LoginController::class, 'delete'])->name('delete');
    Route::post('/download', [\App\Http\Controllers\PdfController::class, 'download'])->name('pdf.download');
    Route::post('/pdf_upload', [\App\Http\Controllers\PdfController::class, 'upload'])->name('pdf.upload');
});

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.index');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login_'])->name('login.login');

Route::get('/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register.index');
Route::post('/register', [\App\Http\Controllers\LoginController::class, 'register_'])->name('register.register');
