<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PageController;

// Rute untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    // Rute Login dan Register Standar
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

    // Rute untuk Google Login
    Route::get('/auth/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
});

// Rute untuk pengguna yang sudah terautentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('pages.dashboard');})->name('dashboard');

    Route::get('/laporan-keuangan', [PageController::class, 'showFinancialReport'])->name('reports.financial');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
