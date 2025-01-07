@extends('users.management.dashboard')

@section('title', 'Editar Unidad Regional')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Editar Unidad Regional</h2>
        <form action="{{ route('regional_units.update', $regionalUnit->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $regionalUnit->name }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="center_id" class="block text-gray-700">Centro</label>
                <select name="center_id" id="center_id" class="w-full p-2 border border-gray-300 rounded mt-1">
                    @foreach($centers as $center)
                        <option value="{{ $center->id }}" {{ $regionalUnit->center_id == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar</button>
        </form>
    </div>
@endsection
