<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        // Obtener el usuario autenticado
        $user = $request->user();

        // Verificar si el usuario tiene uno de los roles permitidos
        if (!$user || !in_array($user->role, array_map(fn($role) => UserRole::from($role), $roles))) {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request); // Permitir continuar si el rol es válido
    }
}
