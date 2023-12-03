@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@section('content')
    <div class="container">
        <a href="{{ route('libros.create') }}" class="btn btn-primary mb-3">Agregar Libro</a>
        
        <!-- Sección para buscar por autor -->
        <h3>Buscar por Nombre de Autor:</h3>
        <form action="{{ route('libros.index') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="nombre_autor">Nombre del Autor:</label>
                <div class="input-group">
                    <input type="text" name="nombre_autor" class="form-control" placeholder="Ingrese el nombre del autor">
                    <div class="input-group-append">
                        <button  class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </form>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Año</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                    <tr>
                        <td>{{ $libro->id }}</td>
                        <td>{{ $libro->nombre }}</td>
                        <td>{{ $libro->year }}</td>
                        <td>{{ $libro->autor->nombre }}</td>
                        <td>
                            <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </table>
    </div>
@endsection