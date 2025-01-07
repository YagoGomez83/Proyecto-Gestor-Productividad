<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Manejar la solicitud de login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {

        // Validar las credenciales del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Obtener el rol del usuario autenticado
            $role = Auth::user()->role;


            // Redirigir según el rol
            if ($role->value === 'operator') {
                return redirect()->route('operator.dashboard');
            } elseif (in_array($role->value, ['supervisor', 'coordinator'])) {
                return redirect()->route('management.dashboard');
            }

            // Si el rol no coincide, cerrar sesión por seguridad
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Rol no autorizado.',
            ]);
        }

        // Si las credenciales son incorrectas, volver al login con error
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Cierra la sesión
        $request->session()->invalidate();  // Invalida la sesión
        $request->session()->regenerateToken();  // Regenera el token CSRF para prevenir ataques

        return redirect()->route('public.index');  // Redirige al usuario a la página pública (o página de inicio)
    }
}
