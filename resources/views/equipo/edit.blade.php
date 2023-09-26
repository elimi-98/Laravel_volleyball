@extends('layouts.plantillabase')
<!-- boostrap -->

@section('contenido')

<h2> EDITAR EQUIPO </h2>  

<form action="/equipo/{{$equipo->id}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$equipo->nombre}}" tabindex="1">    
    @error('nombre')
    <br>
      <small>*{{$message}}</small>
    <br>
    @enderror
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Ciudad</label>
    <input id="ciudad" name="ciudad" type="text" class="form-control" value="{{$equipo->ciudad}}"tabindex="2">
    @error('ciudad')
    <br>
      <small>*{{$message}}</small>
    <br>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Jugadores</label>
    <input id="jugadores" name="jugadores" type="number" class="form-control" value="{{$equipo->jugadores}}" tabindex="3">
    @error('jugadores')
    <br>
      <small>*{{$message}}</small>
    <br>
    @enderror
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Division</label>
    <input id="division" name="division" type="number" class="form-control" value="{{$equipo->division}}" tabindex="4">
    @error('division')
    <br>
      <small>*{{$message}}</small>
    <br>
    @enderror
  </div>
  
  <a href="/equipo" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection