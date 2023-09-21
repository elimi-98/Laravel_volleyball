@extends('layouts.plantillabase')

@section('contenido')
<h2> REGISTRAR PARTIDO </h2>  

<form action="{{route('partido.store')}}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="equipo_local" class="form-label">Equipo local</label>
        <select name="equipo_local" class="form-control">
            <option value="" disabled selected>Selecciona un equipo...</option>"
            @foreach($equipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
            @endforeach
        </select>
  </div>
  <div class="mb-3">
    <label for="equipo_visitante" class="form-label">Equipo visitante</label>
        <select name="equipo_visitante" class="form-control">
          <option value="" disabled selected>Selecciona un equipo...</option>"
          @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
          @endforeach
      </select>
  </div>
  <div class="mb-3">
    <label for="ciudad" class="form-label">Ciudad</label>
        <select name="ciudad" class="form-control">
          <option value="" disabled selected>Selecciona una ciudad...</option>"
          @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->ciudad}}</option>
          @endforeach
      </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="timestamp" type="date" class="form-control" tabindex="3">
  </div>
  <a href="/partido" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@endsection