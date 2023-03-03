<?php

namespace App\Http\Controllers\Laradb;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return 'Home';
    }
}
