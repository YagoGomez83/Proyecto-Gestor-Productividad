@extends('users.management.dashboard')

@section('title', 'Subcódigos de Desplazamiento')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Subcódigos de Desplazamiento</h1>
<div class="flex justify-between items-center">
    <a href="{{ route('subPoliceMovementCodes.create',$policeMovementCodeId) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 my-10  justify-center inline-block">Crear Subcódigo de Desplazamiento</a>  
    <a href="{{ route('policeMovementCodes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 my-10  justify-center inline-block">Regresar</a>
</div>
    
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Descripción</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subCodes as $subCode)
                <tr>
                    <td class="border px-4 py-2">{{ $subCode->description }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('subPoliceMovementCodes.edit', $subCode->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                        <form action="{{ route('subPoliceMovementCodes.destroy', $subCode->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
