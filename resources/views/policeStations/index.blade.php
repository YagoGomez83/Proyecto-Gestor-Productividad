@extends('users.management.dashboard')

@section('title', 'Comisarías por Ciudad')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Comisarías por Ciudad</h1>

        <!-- Botón para crear una nueva comisaría -->
        <div class="mb-4">
            <a href="{{ route('policeStations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Crear Comisaría
            </a>
        </div>

        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Ciudad</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Comisaría</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 font-semibold bg-gray-100" colspan="3">
                            {{ $city->name }}
                        </td>
                    </tr>
                    @foreach ($policeStations->where('city_id', $city->id) as $policeStation)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"></td>
                            <td class="border border-gray-300 px-4 py-2">{{ $policeStation->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('policeStations.edit', $policeStation->id) }}" class="text-blue-500 mr-2">
                                    Editar
                                </a>
                                <form action="{{ route('policeStations.destroy', $policeStation->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500" onclick="return confirm('¿Estás seguro de eliminar esta comisaría?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
