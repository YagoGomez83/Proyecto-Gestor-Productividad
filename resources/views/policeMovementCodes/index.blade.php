@extends('users.management.dashboard')

@section('title', 'Códigos de Desplazamiento')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Códigos de Desplazamiento</h1>
    <a href="{{ route('policeMovementCodes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 my-10  justify-center inline-block">Crear Código de Desplazamiento</a> 
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Código</th>
                <th class="py-2">Descripción</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($codes as $code)
                <tr>
                    <td class="border px-4 py-2">{{ $code->code }}</td>
                    <td class="border px-4 py-2">{{ $code->description }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('subPoliceMovementCodes.index', ['policeMovementCode' => $code->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver Subcódigos</a>
                        <a href="{{ route('policeMovementCodes.edit', $code->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                        <form action="{{ route('policeMovementCodes.destroy', $code->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
