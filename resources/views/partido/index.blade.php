@extends('layouts.plantillabase')

@section('contenido')

<div class="container mt-5 text-center">
    <a href="partido/create" class="btn btn-outline-primary">CREAR PARTIDO</a>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Tabla con Columnas en Bootstrap 5</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th class="text-center">Columna 1</th>
                <th class="text-center">Columna 2</th>
                <th class="text-center">Columna 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">Dato 1.1</td>
                <td class="text-center">Dato 1.2</td>
                <td class="text-center">Dato 1.3</td>
            </tr>
            <tr>
                <td class="text-center">Dato 2.1</td>
                <td class="text-center">Dato 2.2</td>
                <td class="text-center">Dato 2.3</td>
            </tr>
            <!-- Puedes agregar más filas según sea necesario -->
        </tbody>
    </table>
</div>
@endsection

