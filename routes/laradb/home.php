<?php

use App\Http\Controllers\Laradb\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('home', HomeController::class)
    ->name('home');
