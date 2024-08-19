<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\AnggotaController;
use App\Http\Middleware\HaveAuth;
use App\Http\Controllers\PdlController;
use App\Http\Middleware\HaveNtAuth;
use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\DroppingController;
use App\Http\Controllers\StortingController;

Route::middleware([HaveAuth::class,])->group(function () {
    Route::get('signin', [AuthController::class, 'signinview'])->name('signin');
    Route::post('signin/auth', [AuthController::class, 'signin'])->name('auth');
});
Route::middleware([HaveNtAuth::class,])->group(function () {
    Route::get('signout', [AuthController::class, 'signout'])->name('signout');
    Route::resource('anggota', AnggotaController::class);
    Route::resource('dropping', DroppingController::class)->except(['create',]);
    Route::resource('storting', StortingController::class)->except(['create',]);
    Route::get('dropping/create/{id}', [DroppingController::class, 'create'])->name('dropping.create');
    Route::get('storting/create/{id}', [StortingController::class, 'create'])->name('storting.create');
    Route::get('anggota/list/get', [JsonController::class, 'anggota'])->name('anggotaget');
    Route::get('dashboard', function () {
        return view('dashboard.pages.dashboard');
    });
    
    Route::middleware([AuthAdmin::class,])->group(function () {
        Route::resource('pdl', PdlController::class)->except(['create',]);
        Route::get('pdl/list/get', [JsonController::class, 'pdl'])->name('pdlget');
        Route::get('staff/create', [AuthController::class, 'signupview'])->name('addstaff');
        Route::post('staff/auth', [AuthController::class, 'signup'])->name('staffauth');
        Route::get('staff/list', [AuthController::class, 'usershow'])->name('staff');
        Route::get('user/list/get', [JsonController::class, 'user'])->name('userget');
        Route::get('dropping/list/get', [JsonController::class, 'dropping'])->name('droppingget');
        Route::resource('cabang', CabangController::class);
        Route::get('cabang/list/get', [JsonController::class, 'cabang'])->name('cabangget');
        Route::get('storting/list/get', [JsonController::class, 'storting'])->name('stortingget');
        Route::get('staff/{id}/edit', [AuthController::class, 'edit'])->name('staffedit');
        Route::delete('staff/{id}/delete', [AuthController::class, 'userdelete'])->name('staffdelete');
        Route::put('staff/{id}', [AuthController::class, 'update'])->name('staffupdate');
    });
});


