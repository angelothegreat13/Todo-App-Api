<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\TodoController;

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // todos
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todos/{todo}',[TodoController::class, 'show'])->name('todos.show');
    Route::post('/todos',[TodoController::class, 'store'])->name('todos.store');
    Route::patch('/todos/{todo}',[TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{todo}',[TodoController::class, 'destroy'])->name('todos.destroy');    
}); 

Route::prefix('v1')->group(function () {
    // auth
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register',[AuthController::class, 'register'])->name('auth.register');
});

