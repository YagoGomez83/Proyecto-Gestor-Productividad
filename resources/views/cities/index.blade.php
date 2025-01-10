@extends('users.management.dashboard')

@section('title', 'Ciudades y localidades de San Luis')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Ciudades</h1>
            <a href="{{ route('cities.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Crear Ciudad
            </a>
        </div>

        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Unidad Regional</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Ciudad</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities->groupBy('regionalUnit.name') as $regionalUnitName => $citiesGroup)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 font-semibold bg-gray-100" colspan="3">
                            {{ $regionalUnitName }}
                        </td>
                    </tr>
                    @foreach ($citiesGroup as $city)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"></td>
                            <td class="border border-gray-300 px-4 py-2">{{ $city->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('cities.edit', $city->id) }}" class="text-yellow-500 hover:text-yellow-600">
                                        Editar
                                    </a>
                                    <form action="{{ route('cities.destroy', $city->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta ciudad?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
