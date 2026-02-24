<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Allow programmatic login (use cautiously). This excludes the
        // `/iniciar-sesion` route from CSRF verification so curl/tests
        // can POST credentials without a CSRF token. Keep this only for
        // local/dev environments or adjust to use a more secure API auth.
        'iniciar-sesion',
    ];
}
