<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string|null ...$guards
     *
     * @return Response|RedirectResponse
     *
     * @throws BindingResolutionException
     */
    public function handle(
        Request $request,
        Closure $next,
        ...$guards
    ): Response | RedirectResponse {
        $guards = count($guards) === 0 ? [null] : $guards;

        foreach ($guards as $guard) {
            if (app()->make(Auth::class)::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
