<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as M;

class PreventRequestsDuringMaintenance extends M
{
    /**
     * @var array<int, string>
     */
    protected $except = [];
}
