<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost/Documenta/public/festivales/agregar/crear',
        'http://localhost/festivales/agregar/crear',
        'http://localhost/public/festivales/agregar/crear',
        'http://104.131.127.247/festivales/agregar/crear',
        'http://104.131.127.247/public/festivales/agregar/crear'
    ];
}
