@extends('layouts.plantillabase')

@section('contenido')
<div class=" flex mt-3 items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-4 max-w-md w-full">
        <h2 class="text-2xl font-semibold mb-4">Detalles del partido</h2>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Equipo local:</strong> {{$partido->local->nombre}}
        </div>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Equipo visitante:</strong> {{$partido->visitante->nombre}}
        </div>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Ciudad:</strong> {{$partido->local->ciudad}}
        </div>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Fecha:</strong> {{$partido->fecha}}
        </div>
        <div class="p-3 rounded-lg shadow-md bg-gray-100 mb-2">
            <strong class="font-bold">Hora:</strong> {{$partido->hora}}
        </div>
        <div class="flex justify-center">
            <a href="{{ route('partido.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white rounded-md px-4 py-2 font-normal transition duration-300 mt-4 no-underline">Volver</a>
        </div>
    </div>
</div>
@endsection