<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\AnggotaController;
use App\Http\Middleware\HaveAuth;
use App\Http\Middleware\HaveNtAuth;
use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\JsonController;

Route::middleware([HaveAuth::class,])->group(function () {
    Route::get('signin', [AuthController::class, 'signinview'])->name('signin');
    Route::post('signin/auth', [AuthController::class, 'signin'])->name('auth');
});
Route::middleware([HaveNtAuth::class,])->group(function () {
    Route::get('signout', [AuthController::class, 'signout'])->name('signout');
    Route::resource('anggota', AnggotaController::class);
    Route::get('anggota/list/get', [JsonController::class, 'anggota'])->name('anggotaget');
    Route::get('dashboard', function () {
        return view('dashboard.pages.dashboard');
    });
    
    Route::middleware([AuthAdmin::class,])->group(function () {
        Route::get('staff/create', [AuthController::class, 'signupview'])->name('addstaff');
        Route::post('staff/auth', [AuthController::class, 'signup'])->name('staffauth');
        Route::get('staff/list', [AuthController::class, 'usershow'])->name('staff');
        Route::get('user/list/get', [JsonController::class, 'user'])->name('userget');
        Route::resource('cabang', CabangController::class);
        Route::get('cabang/list/get', [JsonController::class, 'cabang'])->name('cabangget');
    });
});


