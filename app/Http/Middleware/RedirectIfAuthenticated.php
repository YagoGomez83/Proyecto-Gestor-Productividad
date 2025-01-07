<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // App\Http\Middleware\RedirectIfAuthenticated.php
    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirige según el rol del usuario autenticado
                $role = Auth::user()->role;

                if ($role === 'operator') {
                    return redirect('/operator/dashboard');
                } elseif (in_array($role, ['coordinator', 'supervisor'])) {
                    return redirect('/management/dashboard');
                }

                return redirect('/'); // Ruta predeterminada si no tiene rol asignado
            }
        }

        return $next($request);
    }
}
