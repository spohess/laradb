<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/auth/login',
    LoginController::class
)->middleware(
    'guest'
)->name(
    'login'
);
