<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\AnggotaController;
use App\Http\Middleware\HaveAuth;
use App\Http\Controllers\PdlController;
use App\Http\Middleware\HaveNtAuth;
use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\DroppingController;
use App\Http\Controllers\StortingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ExportController;


Route::middleware('guest')->group(function () {
    Route::get('signin', [AuthController::class, 'signinview'])->name('signin');
    Route::post('signin/auth', [AuthController::class, 'signin'])->name('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('signout', [AuthController::class, 'signout'])->name('signout');
    Route::get('laporan/bulanan/cbm', [LaporanController::class, 'laporanbulanancbm'])->name('laporanbulanancbm');
    Route::get('laporan/bulanan/pbm', [LaporanController::class, 'laporanbulananpbm'])->name('laporanbulananpbm');
    Route::post('export-anggota', [ExportController::class, 'exportanggota']);
    Route::post('export-storting', [ExportController::class, 'exportstorting']);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('dropping', DroppingController::class)->except(['create',]);
    Route::resource('storting', StortingController::class)->except(['create',]);
    Route::get('dropping/create/{id}', [DroppingController::class, 'create'])->name('dropping.create');
    Route::get('storting/create/{id}', [StortingController::class, 'create'])->name('storting.create');
    Route::get('dashboard', function () {
        return view('dashboard.pages.dashboard');
    });

    Route::middleware([AuthAdmin::class,])->group(function () {
        Route::resource('pdl', PdlController::class);
        Route::get('staff/create', [AuthController::class, 'signupview'])->name('addstaff');
        Route::post('staff/auth', [AuthController::class, 'signup'])->name('staffauth');
        Route::get('staff/list', [AuthController::class, 'usershow'])->name('staff');
        Route::resource('cabang', CabangController::class);
        Route::get('staff/{id}/edit', [AuthController::class, 'edit'])->name('staffedit');
        Route::delete('staff/{id}/delete', [AuthController::class, 'userdelete'])->name('staffdelete');
        Route::put('staff/{id}', [AuthController::class, 'update'])->name('staffupdate');
    });
});


