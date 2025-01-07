@extends('users.management.dashboard')

@section('title', 'Grupos del Centro')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Grupos de {{ $center->name }}</h2>
    <table class="min-w-full bg-white border border-gray-300 p-10">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Nombre</th>
                <th class="px-4 py-2 border-b">Operadores</th>
                <th class="px-4 py-2 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($center->groups as $group)
            <tr>
                <td class="border-b px-4 py-2">{{ $group->name }}</td>
                <td class="border-b px-4 py-2">
                    <a href="{{ route("group.users", $group->id) }}">Miembros</a>
                </td>
                <td class="border-b px-4 py-2">
                    <a href="{{ route('group.edit', $group->id) }}" class="text-blue-500 hover:underline">Editar</a>
                    <form action="{{ route('group.destroy', $group->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                    </form>

                   
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    
    <a href="{{ route('centers.index') }}" class="text-blue-500 hover:underline">Volver a Centros</a>
</div>
@endsection
