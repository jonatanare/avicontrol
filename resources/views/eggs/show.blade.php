@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalles del registro de huevos</h1>

            <p><strong>ID:</strong> {{ $egg->id }}</p>
            <p><strong>Rango de colección:</strong> {{ $egg->collection_range }}</p>
            <p><strong>Fecha de colección:</strong> {{ $egg->collection_date }}</p>
            <p><strong>Huevos buenos:</strong> {{ $egg->good_eggs }}</p>
            <p><strong>Huevos malos:</strong> {{ $egg->bad_eggs }}</p>
            <p><strong>Notas adicionales:</strong> {{ $egg->additional_notes }}</p>

            <a href="{{ route('eggs.edit', $egg->id) }}" class="btn btn-info">Editar</a>

            <form action="{{ route('eggs.destroy', $egg->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>

            <a href="{{ route('eggs.index') }}" class="btn btn-link">Volver a la lista</a>
        </div>
    </div>
</div>

@endsection
