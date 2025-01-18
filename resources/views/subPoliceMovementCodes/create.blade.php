@extends('users.management.dashboard')

@section('title', 'Crear Subcódigo de Desplazamiento')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Crear Subcódigo de Desplazamiento</h1>

    <form action="{{ route('subPoliceMovementCodes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="police_movement_code_id" value="{{ $policeMovementCodeId }}">

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
            <input type="text" id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex justify-between items-center mt-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Crear
        </button>
    </form>

    <!-- Enlace de regreso alineado a la derecha -->
    
        <a href="{{ route('subPoliceMovementCodes.index', ['policeMovementCode' => $policeMovementCodeId]) }}" class="text-blue-500 hover:text-blue-700 font-bold">
            Regresar
        </a>
    
</div>
</div>
@endsection
