<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Broadcast::routes(['middleware' => ['auth:sanctum']]);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login_execption'])->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('projects')->group(function () {
        Route::post('/create', [ProjectController::class, 'store']);
        Route::patch('/{project}', [ProjectController::class, 'update']);
    });
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index']);
        Route::get('/{id}', [TaskController::class, 'task']);
        Route::post('/create', [TaskController::class, 'store']);
        Route::patch('/{task}', [TaskController::class, 'update']);
        Route::delete('/{id}', [TaskController::class, 'destroy']);
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{id}', [CategoryController::class, 'category']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
