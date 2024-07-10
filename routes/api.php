<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SavedPostController;





Route::get('users', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('/posts', [PostController::class, 'index']);


Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    Route::post('/posts/{post}/comments', [CommentController::class, 'store']);
    Route::patch('/posts/{post}/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::patch('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('saved-posts', [SavedPostController::class, 'index']);
    Route::get('saved-posts/{savedPost}', [SavedPostController::class, 'show']);
    Route::post('saved-posts', [SavedPostController::class, 'store']);
    Route::patch('saved-posts/{savedPost}', [SavedPostController::class, 'update']);
    Route::delete('saved-posts/{savedPost}', [SavedPostController::class, 'destroy']);
});

