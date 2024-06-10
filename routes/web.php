<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});



Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admin')->name('admin.dashboard');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('admin.dashboard');
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
});


Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::view('/register/user', 'auth/register');

Route::get('/otp/verify/{email}', [OtpController::class, 'showVerifyForm'])->name('otp.verify.form');


Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');
Route::post('/otp/resend', [OtpController::class, 'resend']);
