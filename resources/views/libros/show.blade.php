<!-- resources/views/libros/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Libro</h2>
        <p><strong>ID:</strong> {{ $libro->id }}</p>
        <p><strong>Nombre:</strong> {{ $libro->nombre }}</p>
        <p><strong>Año:</strong> {{ $libro->year }}</p>
        <p><strong>Autor:</strong> {{ $libro->autor->nombre }}</p>
        <a href="{{ route('libros.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection
