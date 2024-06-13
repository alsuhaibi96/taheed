<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::view('/register/user', 'auth/register')->name('register.user');
Route::view('/login/customer', 'customer/login')->name('login.customer');


Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('login.admin');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admin')->name('admin.dashboard');

Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
Route::post('customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::delete('customer/delete/{customer}', [CustomerController::class, 'destroy'])->name('customer.delete');


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('admin.dashboard');
});

    // Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');


Route::get('/otp/verify/{email}', [OtpController::class, 'showVerifyForm'])->name('otp.verify.form');



Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');
Route::post('/otp/resend', [OtpController::class, 'resend']);
Route::post('/logout',[AdminController::class,'logout'])->name('logout');


Route::post('/load-component', [ComponentController::class, 'loadComponent']);
Route::post('/update-user-details', [UserController::class, 'updateUserDetails'])->name('update.user.details');
Route::get('/admin/dashboard', [UserController::class, 'fetchCustomers'])->name('customers.list');






