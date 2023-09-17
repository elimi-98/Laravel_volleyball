@extends('layouts.plantillabase')

@section('contenido')
<div class="container mx-auto mt-5">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-semibold mb-4">Detalles del Equipo</h2>
        <div class="p-4 rounded-lg shadow-md bg-gray-100 mb-4">
            <strong class="font-bold">Nombre:</strong> {{ $equipo->nombre }}
        </div>
        <div class="p-4 rounded-lg shadow-md bg-gray-100 mb-4">
            <strong class="font-bold">Ciudad:</strong> {{ $equipo->ciudad }}
        </div>
        <div class="p-4 rounded-lg shadow-md bg-gray-100 mb-4">
            <strong class="font-bold">Número de Jugadores:</strong> {{ $equipo->jugadores }}
        </div>
        <div class="p-4 rounded-lg shadow-md bg-gray-100 mb-4">
            <strong class="font-bold">División:</strong> {{ $equipo->division }}
        </div>
        <div class="flex justify-center">
            <a href="{{ route('equipo.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white rounded-full px-4 py-2 font-bold transition duration-300 mt-4">Volver al Índice</a>
        </div>
    </div>
</div>
@endsection
