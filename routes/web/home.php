<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/home',
    HomeController::class
)->name(
    'home'
);