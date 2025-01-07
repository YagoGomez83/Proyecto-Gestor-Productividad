@extends('users.management.dashboard')

@section('title', 'Lista de Unidades Regionales')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Unidades Regionales</h2>
        <a href="{{ route('regional_units.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
            Crear Unidad Regional
        </a>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Centro</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($regionalUnits as $unit)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $unit->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $unit->center->name }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('regional_units.edit', $unit->id) }}" class="text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('regional_units.destroy', $unit->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
