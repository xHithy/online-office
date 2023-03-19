<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1/auth')->group(function() {
   Route::post('/login', [UserController::class, 'login']);
   Route::post('/logout', [UserController::class, 'logout'])->middleware('verify.user');
});

Route::prefix('/v1/office')->group(function() {
   Route::post('/move', [UserController::class, 'move']);
   Route::get('/locations', [UserController::class, 'locations']);
});
