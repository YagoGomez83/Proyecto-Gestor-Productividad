@extends('layouts.management')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Editar Usuario</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
         <!-- Apellido -->
         <div class="mb-4">
            <label for="last_name" class="block text-gray-700 font-bold mb-2">Apellido</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('last_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror  
            </div>

        <!-- Correo Electrónico -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
            <input type="email" id="email" name="email" required value="{{ old('email', $user->email) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

        <!-- Rol -->
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-bold mb-2">Rol</label>
            <select id="role" name="role" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach (\App\Enums\UserRole::getValues() as $role)
                    <option value="{{ $role }}" {{ old('role', $user->role ?? '') == $role ? 'selected' : '' }}>
                        {{ ucfirst($role) }}
                    </option>
                @endforeach
            </select>
            @error('role')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        

        <!-- Ciudad -->
        <div class="mb-4">
            <label for="city_id" class="block text-gray-700 font-bold mb-2">Ciudad</label>
            <select id="city_id" name="city_id" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" value="{{  old('city_id', $user->city_id) == $city->id ? 'selected' : ''}}">{{ $city->name }}</option>
                @endforeach
            </select>
            @error('city_id')
             <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Dirección -->
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold mb-2">Dirección</label>
            <input type="text" id="address" name="address" required value="{{ old('address', $user->address) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('address')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>

        <!-- Teléfono -->
        <div class="mb-4">
            <label for="phone_number" class="block text-gray-700 font-bold mb-2">Teléfono</label>
            <input type="tel" id="phone_number" name="phone_number" required value="{{ old('phone_number', $user->phone_number) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('phone number')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>

        <!-- Grupo -->
        <div class="mb-4">
            <label for="group_id" class="block text-gray-700 font-bold mb-2">Grupo</label>
            <select id="group_id" name="group_id" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" value="{{ old('group_id', $user->group_id == $group->id ?'selected':'' ) }}">{{ $group->name }}</option>
                @endforeach
            </select>
            @error('group_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>

        
        
        <!-- Contraseña -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
            <input type="password" id="password" name="password" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
        </div>
        
        <!-- Confirmar Contraseña -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password_confirmation')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
