<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaintOfTheDayController;
use App\Http\Controllers\ChatRAGController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

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


// Santos - Popup
Route::middleware('auth')->group(function () {
    Route::get('/saints', [SaintOfTheDayController::class, 'index'])->name('saints.index');
    Route::post('/saints', [SaintOfTheDayController::class, 'store'])->name('saints.store');
    Route::get('/dashboard', [SaintOfTheDayController::class, 'showSaintOfTheDay'])->name('dashboard');
    Route::get('/santos/{id}', [SaintOfTheDayController::class, 'show'])->name('santos.show');
});


// Chat RAG | Langchain
Route::middleware('auth')->group(function () {
    Route::get('/chat-rag', [ChatRAGController::class, 'index'])->name('chat_rag.index');
    Route::post('/chat-rag/upload', [ChatRAGController::class, 'upload'])->name('chat_rag.upload');
    Route::post('/chat-rag/ask', [ChatRAGController::class, 'ask'])->name('chat_rag.ask');
    Route::get('/chat-rag/download/{id}', [ChatRAGController::class, 'download'])->name('chat_rag.download');
    Route::delete('/chat-rag/delete/{id}', [ChatRAGController::class, 'delete'])->name('chat_rag.delete');
});