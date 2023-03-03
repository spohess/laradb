<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as SP;

class AuthServiceProvider extends SP
{
    /**
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
    }
}
