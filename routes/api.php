<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonController;
use App\Http\Middleware\HaveNtAuth;
use App\Http\Middleware\AuthAdmin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('anggota/list/get', [JsonController::class, 'anggota'])->name('anggotaget');
Route::get('pdl/list/get', [JsonController::class, 'pdl'])->name('pdlget');
Route::get('user/list/get', [JsonController::class, 'user'])->name('userget');
Route::get('dropping/list/get', [JsonController::class, 'dropping'])->name('droppingget');
Route::get('cabang/list/get', [JsonController::class, 'cabang'])->name('cabangget');
Route::get('storting/list/get', [JsonController::class, 'storting'])->name('stortingget');
