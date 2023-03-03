<?php

return [
    'url' => env('GOOGLE_RECAPTCHA_URL'),
    'keys' => [
        'private' => env('GOOGLE_RECAPTCHA_PRIVATE'),
        'public' => env('GOOGLE_RECAPTCHA_PUBLIC'),
    ],
];
