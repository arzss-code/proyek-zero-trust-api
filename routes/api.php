<?php

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Api\V1\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Middleware\CheckToken;

// Rute Publik (tidak perlu token)
Route::post('/v1/register', [ApiAuthController::class, 'register']);
Route::post('/v1/login', [ApiAuthController::class, 'login']);


// Rute yang Dilindungi (membutuhkan token yang valid)
Route::middleware('auth:api')->group(function () {

    // Endpoint Logout
    Route::post('/v1/logout', [ApiAuthController::class, 'logout']);

     // Endpoint yang membutuhkan token dengan scope tertentu
    Route::get('/v1/user', [ApiController::class, 'getAuthenticatedUser'])
         ->middleware(CheckToken::using('lihat-profil'));

    Route::get('/v1/laporan-keuangan', [ApiController::class, 'getFinancialReport'])
         ->middleware(CheckToken::using('lihat-laporan-keuangan'));
});
