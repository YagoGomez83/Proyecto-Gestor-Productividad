@extends('users.management.dashboard')

@section('title', 'Miembros del Grupo')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Miembros de {{ $group->name }}</h2>
    <table class="min-w-full bg-white border border-gray-300 p-10">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Nombre</th>
                <th class="px-4 py-2 border-b">Correo Electrónico</th>
                <th class="px-4 py-2 border-b">Rol</th>
                <th class="px-4 py-2 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($group->users as $user)
            <tr>
                <td class="border-b px-4 py-2">{{ $user->name }} {{ $user->last_name }}</td>
                <td class="border-b px-4 py-2">{{ $user->email }}</td>
                <td class="border-b px-4 py-2">{{ $user->role }}</td>
                <td class="border-b px-4 py-2 flex gap-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Editar</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('centers.groups', $group->id) }}" class="text-blue-500 hover:underline">Volver a Grupos</a>
</div>
@endsection
