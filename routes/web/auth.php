<?php

use App\Http\Controllers\Auth\AttemptController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('auth/login', LoginController::class)
    ->middleware('guest')
    ->name('login');

Route::post('auth/attempt', AttemptController::class)
    ->name('auth.attempt');
