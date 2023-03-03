<?php

namespace App\Services\GoogleRecaptcha;

use App\Exceptions\GoogleRecaptcha;
use App\Services\Service;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthenticService implements Service
{
    public function __construct(
        private readonly Request $request,
    ) {
    }

    /**
     * @throws BindingResolutionException
     * @throws GoogleRecaptcha
     */
    public function __invoke()
    {
        $response = app()->make(Http::class)
            ::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
            ])->post(
                config('recaptcha.url') .
                '?secret=' . config('recaptcha.keys.private') .
                '&response=' . $this->request->input('g-recaptcha-response')
            );

        if ($response->failed()) {
            throw new GoogleRecaptcha(
                'Problemas em verificar o reCAPTCHA',
                500
            );
        }

        if (! $response->json('success')) {
            throw new GoogleRecaptcha(
                'reCAPTCHA não válido, tente novamente',
                401
            );
        }
    }
}
