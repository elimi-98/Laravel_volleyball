@extends('layouts.plantillabase')

@section('contenido')

<div class="text-right">
    @if (count($equipos) >= 2)
        <a href="{{ route('partido.index') }}" class="btn btn-primary mt-4">Ver partidos</a>
    @endif
</div>
<div class="container mt-8 text-center">
    <a href="{{ route('equipo.create') }}" class="btn btn-outline-primary">CREAR EQUIPO</a>
</div>

<style>
    /* Estilo personalizado */
    .equipo-card {
        background-color: rgba(0, 0, 255, 0.2);
        border-radius: 10px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
        
    }

    .equipo-title {
        font-size: 40px;
        text-transform: uppercase;
        color: black; 
    }

    .custom-button {
        margin: 15px px; 
        width: auto; 
    }
    
</style>

<body>
    <div class="container mt-5">
        @if ($equipos->isEmpty())
            <p class="text-gray-800 text-center" style="font-size: 20px;">¡Vaya, aún no hay ningún equipo! Crea, al menos dos, para poder gestionar partidos.</p>
        @endif
        <div class="row">
            @foreach ($equipos as $equipo)
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card equipo-card">
                        <div class="card-body text-center">
                            <h5 class="text-gray-800 card-title equipo-title font-weight-bold text-uppercase">{{ $equipo->nombre }}</h5>
                            <p class="text-gray-800" style="font-size: 20px;">{{ $equipo->ciudad }}</p>

                            <div class="mt-4">
                                <a href="/equipo/{{$equipo->id}}" class="btn btn-warning custom-button">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="/equipo/{{$equipo->id}}/edit" class="btn btn-primary custom-button">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button type="button" class="btn btn-danger custom-button" data-bs-toggle="modal"
                                    data-bs-target="#confirmDelete{{$equipo->id}}">
                                    <i class="material-icons">delete</i>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Modal de confirmación de borrado -->
            <div class="modal fade" id="confirmDelete{{$equipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="{{route('equipo.destroy', $equipo->id)}}" method="POST">
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
</body>
</html>
@endsection