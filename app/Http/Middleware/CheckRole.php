<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = auth()->user();

        if (!$user || !$user->role || !in_array($user->role->nom, $roles)) {
            abort(403, 'Accès refusé');
        }

        return $next($request);
    }
}
