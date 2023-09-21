@extends('layouts.plantillabase')

@section('contenido')
<h2 class="mb-4 text-center uppercase mt-5">Equipo</h2>

<div class="container mt-5 text-center">
    <a href="partido/create" class="btn btn-outline-primary">CREAR PARTIDO</a>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Partidos registrados</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th class="text-center">Equipo local</th>
                <th class="text-center">Equipo visitante</th>
                <th class="text-center">Ciudad</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Mostrar</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidos as $partido)
                <tr>
                    <td class="text-center">{{$partido->local->nombre}}</td>
                    <td class="text-center">{{$partido->visitante->nombre}}</td>
                    <td class="text-center">{{$partido->local->ciudad}}</td>
                    <td class="text-center">{{$partido->fecha}}</td>
                    <td class="text-center"><a href="/partido/{{$partido->id}}" class="btn btn-warning">
                        <i class="material-icons">visibility</i>
                    </a></td>
                    <td class="text-center"><a href="/partido/{{$partido->id}}/edit" class="btn btn-primary">
                        <i class="material-icons">edit</i>
                    </a></td>
                    <td class="text-center"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{$partido->id}}">
                        <i class="material-icons">delete</i>
                    </button></td>
                </tr> 
                
                
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
                                <form action="{{route('equipo.destroy', $partido->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

