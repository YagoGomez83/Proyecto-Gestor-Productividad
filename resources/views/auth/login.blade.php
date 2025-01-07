@extends('layouts.public')

@section('title', 'Login')

@section('content')
<div class="min-h-screen grid grid-cols-1 md:grid-cols-2 container p-4 justify-center items-center shadow-sm ">
    <!-- Columna izquierda: Imagen -->
    <div class="hidden md:block rounded">
        <img src="{{ asset('images/bigdata02.jpg') }}" alt="Imagen de Login" class="w-full h-full object-cover">
    </div>

    <!-- Columna derecha: Formulario -->
    <div class="flex items-center justify-center bg-gray-50 px-6 py-12">
        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Iniciar Sesión</h2>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <!-- Correo Electrónico -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('email')
                        <span   span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <!-- Contraseña -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('password')
                    <span   span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Botón de Login -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg hover:bg-blue-600 transition">
                        Iniciar Sesión
                    </button>
                </div>
                <!-- Enlaces -->
                {{-- <div class="flex justify-between text-sm">
                    <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Crear una cuenta</a>
                </div> --}}
            </form>
        </div>
    </div>
</div>
@endsection
