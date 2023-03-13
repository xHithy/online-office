<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'landing'])->name('landing');
Route::get('/office', [RouteController::class, 'office'])->name('office');
