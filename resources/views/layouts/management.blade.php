<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<!-- Contenedor principal -->
<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-64 bg-blue-800 text-white p-5 sticky top-0 h-screen">
        <h2 class="text-2xl font-bold mb-10">Menú</h2>
        <ul>
            <li class="mb-4">
                <a href="{{ route('users.create') }}" class="block text-white hover:bg-blue-600 p-2 rounded">
                    Crear Usuario
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('users.operators') }}" class="block text-white hover:bg-blue-600 p-2 rounded">
                    Listar Usuarios
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('regional_units.index') }}" class="block text-white hover:bg-blue-600 p-2 rounded">
                    Unidades Regionales
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('centers.index') }}" class="block text-white hover:bg-blue-600 p-2 rounded">
                    Centros de San Luis
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('management.dashboard') }}" class="block text-white hover:bg-blue-600 p-2 rounded">
                    Dashboard
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 overflow-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Bienvenido, {{ Auth::user()->name }}</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>

        <!-- Contenido de la vista -->
        @yield('content')

    </div>
</div>

@stack('scripts') <!-- Para permitir scripts adicionales desde las vistas hijas -->
</body>
</html>
