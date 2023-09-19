@extends('layouts.plantillabase')
<!-- boostrap y TW -->
@section('contenido')
    <div class="container mt-5 text-center">
        <a href="equipo/create" class="btn btn-outline-primary">CREAR EQUIPO</a>
    </div>

        <style>
            /* Estilo personalizado */
            .equipo-card {
                background-color: rgba(0, 0, 255, 0.2);
                border-radius: 10px;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
                transition: background-color 0.3s ease;
            }

            .equipo-card:hover {
                background-color: rgba(0, 0, 255, 0.4);
            }

            .equipo-title {
                font-size: 24px;
                text-transform: uppercase;
            }
        </style>
    <body>
        <div class="container mt-5">
            <div class="row">
                @foreach ($equipos as $equipo)
                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div class="card equipo-card">
                            <div class="card-body text-center">
                                <h5 class="card-title equipo-title font-weight-bold text-uppercase">{{ $equipo->nombre }}</h5>
                                <p class="text-gray-800">Ciudad: {{ $equipo->ciudad }}</p>
                                <p class="text-gray-800">Número de Jugadores: {{ $equipo->jugadores }}</p>
                                <p class="text-gray-800">División: {{ $equipo->division }}</p>
                                
                                <div class="mt-4">
                                    <a href="/equipo/{{$equipo->id}}" class="btn btn-warning">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                                                        
                                    <a href="/equipo/{{$equipo->id}}/edit" class="btn btn-primary">
                                        <i class="material-icons">edit</i>
                                    </a>                                    
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{$equipo->id}}">
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
