<?php

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

use App\Http\Controllers\SaintOfTheDayController;

Route::middleware('auth')->group(function () {
    Route::get('/saints', [SaintOfTheDayController::class, 'index'])->name('saints.index');
    Route::post('/saints', [SaintOfTheDayController::class, 'store'])->name('saints.store');
    Route::get('/dashboard', [SaintOfTheDayController::class, 'showSaintOfTheDay'])->name('dashboard');
    Route::get('/santos/{id}', [SaintOfTheDayController::class, 'show'])->name('santos.show');
});
