@extends('users.management.dashboard')

@section('title', 'Editar Subcódigo de Desplazamiento')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Subcódigo de Desplazamiento</h1>

    <!-- El formulario para editar el subcódigo -->
    <form action="{{ route('subPoliceMovementCodes.update', $subCode->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
            <!-- El valor actual de description se pasa al campo del formulario -->
            <input type="text" id="description" name="description" value="{{ $subCode->description }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex justify-between items-center mt-4">
            <!-- Botón de actualizar -->
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Actualizar
            </button>
            <!-- Botón de regresar -->
            <a href="{{ route('subPoliceMovementCodes.index', $subCode->police_movement_code_id) }}" class="text-blue-500 hover:text-blue-700 font-bold">
                Regresar
            </a>
        </div>
    </form>
</div>
@endsection
