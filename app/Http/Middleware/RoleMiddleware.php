<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Jika user belum login, lempar 403
        if (! $request->user()) {
            abort(403, 'Unauthorized access.');
        }

        // Admin punya akses ke semuanya (Super Power)
        if ($request->user()->role === 'admin') {
            return $next($request);
        }

        // Cek apakah role user ada di dalam daftar role yang diizinkan
        if (! in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized access: You do not have the required role.');
        }

        return $next($request);
    }
}
