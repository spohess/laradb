<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as SP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends SP
{
    public const HOME = '/laradb/home';

    /**
     * @return void
     *
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'auth'])
                ->prefix('laradb')
                ->group(base_path('routes/laradb.php'));
        });
    }

    /**
     * @throws BindingResolutionException
     */
    protected function configureRateLimiting(): void
    {
        $rateLimiter = app()->make(RateLimiter::class);
        $rateLimiter::for('api', function (Request $request) {
            $limit = app()->make(Limit::class);
            return $limit::perMinute(60)
                ->by(
                    $request->user()?->id ? $request->user()
                        ->id : $request->ip()
                );
        });
    }
}
