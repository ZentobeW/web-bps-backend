<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublikasiController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    // Yang sudah ada
    Route::get('/publikasi', [PublikasiController::class, 'index']);
    Route::post('/publikasi', [PublikasiController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Yang perlu ditambahkan
    Route::get('/publikasi/{id}', [PublikasiController::class, 'show']);      // Detail publikasi
    Route::put('/publikasi/{id}', [PublikasiController::class, 'update']);    // Update publikasi
    Route::delete('/publikasi/{id}', [PublikasiController::class, 'destroy']); // Hapus publikasi
});
