<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\JsonController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\HaveNtAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | API Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register API routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "api" middleware group. Make something great!
 * |
 */

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [ApiController::class,'login'])->name('login');
    Route::post('logout', [ApiController::class,'logout'])->name('logout');
    Route::post('refresh', [ApiController::class,'refresh'])->name('refresh');
    Route::post('me', [ApiController::class,'me'])->name('me');
});

Route::get('pdl/list/get', [JsonController::class, 'pdl'])->name('pdlget');
Route::get('user/list/get', [JsonController::class, 'user'])->name('userget');
Route::get('anggota/list/get', [JsonController::class, 'anggota'])->name('anggotaget');
Route::get('dropping/list/get', [JsonController::class, 'dropping'])->name('droppingget');
Route::get('cabang/list/get', [JsonController::class, 'cabang'])->name('cabangget');
Route::get('storting/list/get', [JsonController::class, 'storting'])->name('stortingget');
