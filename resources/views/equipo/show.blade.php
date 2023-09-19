@extends('layouts.plantillabase')

<!-- TW -->

@section('contenido')
<div class=" flex mt-3 items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-4 max-w-md w-full">
        <h2 class="text-2xl font-semibold mb-4">Detalles del Equipo</h2>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Nombre:</strong> {{ $equipo->nombre }}
        </div>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Ciudad:</strong> {{ $equipo->ciudad }}
        </div>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Número de Jugadores:</strong> {{ $equipo->jugadores }}
        </div>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">División:</strong> {{ $equipo->division }}
        </div>
        <div class="flex justify-center">
            <a href="{{ route('equipo.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white rounded-md px-4 py-2 font-normal transition duration-300 mt-4 no-underline">Volver</a>
        </div>
    </div>
</div>
@endsection
