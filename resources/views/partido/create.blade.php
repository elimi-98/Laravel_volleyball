@extends('layouts.plantillabase')

@section('contenido')
<h2> REGISTRAR PARTIDO </h2>  

<form action="/partidos" method="POST">
    @csrf
  <div class="mb-3">
    <label for="nombre" class="form-label">Equipo local</label>
        <select name="nombre" id="nombre" class="form-control">
            <option value="" disabled selected>Selecciona un equipo</option>"
            @foreach($equipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
            @endforeach
        </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Equipo visitante</label>
    <input id="equipo_visitante" name="equipo_visitante" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Ciudad</label>
    <input id="ciudad" name="ciudad" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" class="form-control" tabindex="3">
  </div>
  <a href="/partido" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@endsection