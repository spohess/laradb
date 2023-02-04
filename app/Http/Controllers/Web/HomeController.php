<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('web.home', $this->context);
    }
}