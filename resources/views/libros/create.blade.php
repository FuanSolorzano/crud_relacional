<!-- resources/views/libros/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Agregar Libro</h2>
        <form action="{{ route('libros.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="year">Año:</label>
                <input type="number" name="year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_autor">Autor:</label>
                <select name="id_autor" class="form-control" required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Libro</button>
        </form>
    </div>
@endsection
