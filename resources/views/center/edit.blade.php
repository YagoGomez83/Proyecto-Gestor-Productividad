@extends('users.management.dashboard')

@section('title', 'Editar Centro')


@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Editar Centro</h2>
    <form action="{{ route('centers.update',$center->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <!-- Nombre -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Nombre
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-4"
                id="name"
                type="text"
                name="name"
                value="{{ $center->name }}"
                required
            >
            @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>       
            @enderror

        </div>
       
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Actualizar
                </button>
            </div>
           
    </form>
   
</div>
    @endsection