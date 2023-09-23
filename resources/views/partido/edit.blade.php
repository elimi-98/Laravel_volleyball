@extends('layouts.plantillabase')

@section('contenido')
<h2> EDITAR PARTIDO </h2>  

<form action="/partido/{{$partido->id}}" method="POST">
    @method ('PUT')
    @csrf
    <div class="mb-3">
        <label for="equipo_local" class="form-label">Equipo local</label>
        <select name="equipo_local" class="form-control" tabindex="1">
            <option value="" disabled selected>Selecciona un equipo...</option>
            @foreach($equipos as $equipo)
                <option value="{{$equipo->id}}" {{$partido->equipo_local == $equipo->id ? 'selected' : ''}}>{{$equipo->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="equipo_visitante" class="form-label">Equipo visitante</label>
        <select name="equipo_visitante" class="form-control" tabindex="2">
            <option value="" disabled selected>Selecciona un equipo...</option>
            @foreach($equipos as $equipo)
                <option value="{{$equipo->id}}" {{$partido->equipo_visitante == $equipo->id ? 'selected' : ''}}>{{$equipo->nombre}}</option>
            @endforeach
        </select>
    </div>
   
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input id="fecha" name="fecha" type="date" class="form-control" value="{{$partido->fecha}}" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="hora" class="form-label">Hora</label>
        <input id="hora" name="hora" type="time" class="form-control" value="{{$partido->hora}}" tabindex="5">
    </div>
    
    <a href="/partido" class="btn btn-secondary" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>
@endsection
