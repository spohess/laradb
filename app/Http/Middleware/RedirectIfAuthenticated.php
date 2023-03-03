<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string ...$guards
     *
     * @return Response
     *
     * @throws BindingResolutionException
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$guards
    ): Response {
        $guards = sizeof($guards) === 0 ? [null] : $guards;

        foreach ($guards as $guard) {
            if (app()->make(Auth::class)::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
