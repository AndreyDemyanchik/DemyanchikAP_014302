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
        'api/visualization/clients',
        'api/visualization/scooters',
        'api/visualization/malfunctions',
        'api/visualization/rides',
        'api/user/update',
        'api/user/password',
        'api/user/destroy'
    ];
}
