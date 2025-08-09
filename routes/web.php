<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    if (session()->has('user')) {
        
        return app()->call(\App\Http\Controllers\HomeController::class.'@index');
    }
  
    return view('login');
});


Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/otp-login', [\App\Http\Controllers\AuthController::class, 'showOtpLoginForm']);
Route::post('/otp-request', [\App\Http\Controllers\AuthController::class, 'requestOtp'])->name('otp.request');
Route::get('/verify-otp', [\App\Http\Controllers\AuthController::class, 'showOtpVerifyForm'])->name('otp.verify.form');
Route::post('/verify-otp', [\App\Http\Controllers\AuthController::class, 'verifyOtp'])->name('otp.verify');
