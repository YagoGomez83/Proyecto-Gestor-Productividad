@extends('users.management.dashboard')

@section('title', 'Unidades Regionales del Centro')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Unidades Regionales de {{ $center->name }}</h2>
    <ul>
        @foreach($center->regionalUnits as $regionalUnit)
            <li class="mb-2">{{ $regionalUnit->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('centers.index') }}" class="text-blue-500 hover:underline">Volver a Centros</a>
</div>
@endsection
