@extends('users.management.dashboard')

@section('title', 'Centros de San Luis')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Centros</h2>
    <a href="{{ route('centers.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
        Crear Centro
    </a>
    <table class="min-w-full bg-white border border-gray-300 p-10">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Nombre</th>
                <th class="px-4 py-2 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($centers as $center)
                <tr>
                    <td class="px-4 py-2 border-b text-center">{{ $center->name }}</td>
                    <td class="px-4 py-2 border-b flex justify-center gap-2">
                        <a href="{{ route('centers.edit', $center->id) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('centers.destroy', $center->id) }}" method="POST" class="inline-block">
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