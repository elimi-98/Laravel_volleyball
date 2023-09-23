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
    <label for="fecha" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" class="form-control">
  </div>
  <div class="mb-3">
    <label for="hora" class="form-label">Hora</label>
    <input id="hora" name="hora" type="time" class="form-control">
</div>
  <a href="/partido" class="btn btn-secondary" >Cancelar</a>
  <button type="submit" class="btn btn-primary" >Guardar</button>
</form>
@endsection