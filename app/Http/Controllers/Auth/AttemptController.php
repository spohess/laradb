<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\GoogleRecaptcha;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AttemptRequest;
use App\Services\GoogleRecaptcha\AuthenticService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AttemptController extends Controller
{
    /**
     * @param AttemptRequest $request
     *
     * @return RedirectResponse
     *
     * @throws BindingResolutionException
     */
    public function __invoke(AttemptRequest $request)
    {
        try {
            app()->make(AuthenticService::class, ['request' => $request])();
        } catch (GoogleRecaptcha $exception) {
            return back()->withErrors(['error' => $exception->getMessage()]);
        }

        $attempt = $this->makeAttempt($request);
        if ($attempt) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'Usuário inválido ou bloqueado',
        ]);
    }

    /**
     * @throws BindingResolutionException
     */
    private function makeAttempt(AttemptRequest $request): bool
    {
        return app()->make(Auth::class)::attemptWhen(
            $request->only(['email', 'password']),
            function ($user) {
                return $user->active;
            },
            $request->input('remember_token')
        );
    }
}
