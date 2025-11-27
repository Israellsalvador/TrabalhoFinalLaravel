<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivroController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/livros', [LivroController::class, 'index']);
    Route::get('/livros/criar', [LivroController::class, 'create']);
    Route::post('/livros', [LivroController::class, 'store']);
    Route::get('/livros/{id}/editar', [LivroController::class, 'edit']);
    Route::put('/livros/{id}', [LivroController::class, 'update']);
    Route::delete('/livros/{id}', [LivroController::class, 'destroy']);
});

Route::redirect('/', '/livros');
