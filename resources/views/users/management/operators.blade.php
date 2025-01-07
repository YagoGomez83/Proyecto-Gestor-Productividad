@extends('layouts.management')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Operadores en mi grupo</h1>

        <div class="bg-white shadow-md rounded-lg p-4">
            <ul class="space-y-4">
                @foreach ($operators as $operator)
                    <li class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                        <div class="flex flex-col">
                            <span class="text-xl font-medium text-gray-700">{{ $operator->name }}</span>
                            <span class="text-sm text-gray-500">{{ $operator->email }}</span>
                            <span class="text-sm text-gray-400">{{ $operator->group->name }}</span>
                            <span class="text-sm text-gray-400">{{ $operator->group->center->name }}</span>
                        </div>

                        <div class="flex items-center space-x-3">
                            <!-- Botón de editar -->
                            <a href="{{ route('users.edit', $operator->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                Editar
                            </a>
                            <!-- Botón de eliminar -->
                            <!-- Botón de eliminar -->
                        <form action="{{ route('users.destroy', $operator->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                                Eliminar
                            </button>
                        </form>
                        </div>
                        
                        

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
