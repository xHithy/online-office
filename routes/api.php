<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1/auth')->group(function() {
   Route::post('/login', [UserController::class, 'login']);
   Route::post('/logout', [UserController::class, 'logout'])->middleware('verify.user');
});

Route::prefix('/v1/office')->middleware('verify.user')->group(function() {
   Route::post('/move', [UserController::class, 'move']);
   Route::get('/locations', [UserController::class, 'locations']);
});

Route::prefix('/v1/messages')->middleware('verify.user')->group(function() {
   Route::get('/{room}', [MessageController::class, 'messages']);
});
