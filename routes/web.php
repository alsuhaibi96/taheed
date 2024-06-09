<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>['role:admin']],function(){
    Route::get('/user', [UserController::class, 'index'])->name('admin.dashboard');
});

Route::group(['middleware'=>['role:user']],function(){
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
});