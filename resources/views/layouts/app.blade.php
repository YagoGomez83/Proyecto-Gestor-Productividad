<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema')</title>
    @vite('resources/css/app.css') <!-- Incluye el archivo de Tailwind generado por Vite -->
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Contenido principal -->
        <div class="ml-64 w-full p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
