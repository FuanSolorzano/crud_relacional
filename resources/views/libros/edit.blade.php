<!-- resources/views/libros/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Libro</h2>
        <form action="{{ route('libros.update', $libro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $libro->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="year">Año:</label>
                <input type="number" name="year" class="form-control" value="{{ $libro->year }}" required>
            </div>
            <div class="form-group">
                <label for="id_autor">Autor:</label>
                <select name="id_autor" class="form-control" required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" {{ $libro->id_autor == $autor->id ? 'selected' : '' }}>{{ $autor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Libro</button>
        </form>
    </div>
@endsection
