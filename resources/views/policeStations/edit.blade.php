@extends('users.management.dashboard')

@section('title', 'Editar Comisaría')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Editar Comisaría</h1>

        <form action="{{ route('policeStations.update', $policeStation->id) }}" method="POST" class="bg-white p-6 rounded shadow-md ">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la Comisaría</label>
                <input type="text" name="name" id="name" value="{{ $policeStation->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            @error('name')
             <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div class="mb-4">
                <label for="city_id" class="block text-sm font-medium text-gray-700">Ciudad</label>
                <select name="city_id" id="city_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $policeStation->city_id == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('city_id')
             <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                    Guardar Cambios
                </button>
                <a href="{{ route('policeStations.index') }}" class="ml-2 text-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
