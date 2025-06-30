<?php

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\HomeAdminController;
use Illuminate\Support\Facades\Route;





Route::middleware('guest:admin')->group(function () {

    Route::post('/authenticate', [AuthAdminController::class, 'authenticate'])->name('admin.authenticate');
});


Route::get('/login', [AuthAdminController::class, 'login'])->name('admin.login');


Route::middleware('auth:admin')->group(function () {
    Route::get('/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin.home');
});