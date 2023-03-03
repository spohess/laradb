<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        return redirect(route('login'));
    }
}
