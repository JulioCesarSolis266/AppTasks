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
        //Aqui se agregan las rutas que no se quieren proteger con el token para que otras aplicaciones puedan acceder a ellas sin problemas
        'csrf-cookie',
        'api/V1/login',
        'api/v1/tasks/*',//el * es para que no importe lo que venga despues de tasks
    ];
}
