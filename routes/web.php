<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('landing');
Route::get('/office', [RoomController::class, 'index'])->name('office')->middleware('verify.user');
