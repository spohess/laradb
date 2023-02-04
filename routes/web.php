<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});

require_once 'web/auth.php';
require_once 'web/home.php';