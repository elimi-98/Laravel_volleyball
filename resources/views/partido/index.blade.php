@extends('layouts.plantillabase')

@section('contenido')
<style>
    /* Estilos personalizados */
    .partido-info {
        font-size: 35px; 
        width: 100%;
        margin: 0 auto; 
    }

    .vs {
        font-size: 50px; 
    }

    .fecha {
        font-size: 25px;
    }

    .btn-group {
        margin-top: 10px;
    }
    
    .custom-button {
        margin: 15px 10px; 
        width: auto; 
    }
    
</style>

<div class="container mt-4">
    <h2 class="mb-4 text-center text-uppercase">Temporada 2024</h2>
    <a href=/equipo/ class="btn btn-primary">
        <i class="material-icons">arrow_back</i>
     </a>    
     <div class="row mt-3">
        <div class="col-md-6 offset-md-3 text-center">
            <a href="partido/create" class="btn btn-outline-primary btn-block">CREAR PARTIDO</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12" >
            @if ($partidos->isEmpty())
            <p class="text-gray-800 text-center" style="font-size: 20px;">¡Vaya, aún no hay ningún partido registrado!</p>
            @endif
            @foreach ($partidos as $partido)
                    <div class="col-md-12 text-center">
                        <div class="partido-info text-uppercase">
                            {{ $partido->local->nombre }} <span class="vs">VS</span> {{ $partido->visitante->nombre }}
                        </div>
                        <div class="fecha">
                            {{ $partido->fecha }}
                            </div>
                                <a href="/partido/{{$partido->id}}" class="btn btn-warning custom-button">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="/partido/{{$partido->id}}/edit" class="btn btn-primary custom-button">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger custom-button" data-bs-toggle="modal" data-bs-target="#confirmDelete{{$partido->id}}">
                                    <i class="material-icons">delete</i>
                                </button>
                            <div class="text-center row mt-3 border rounded p-3 partido-row bg-slate-300 mx-auto my-auto" style="width: 60% "> </div>

                        </div>
                    </div>
                <!-- Modal de confirmación de borrado -->
                
                <div class="modal fade" id="confirmDelete{{$partido->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrado</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estás segur@ de que quieres borrar este equipo?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{route('partido.destroy', $partido->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection