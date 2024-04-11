@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Detalles del feed</h1>

                <p><strong>ID:</strong> {{ $feed->id }}</p>
                <p><strong>Rango de adición:</strong> {{ $feed->addition_range }}</p>
                <p><strong>Fecha de adición:</strong> {{ $feed->addition_date }}</p>
                <p><strong>Tipo de alimento:</strong> {{ $feed->feed_type }}</p>
                <p><strong>Cantidad:</strong> {{ $feed->quantity }}</p>
                <p><strong>Notas adicionales:</strong> {{ $feed->additional_notes }}</p>

                <a href="{{ route('feeds.edit', $feed->id) }}">Editar</a>

                <form action="{{ route('feeds.destroy', $feed->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>

                <a href="{{ route('feeds.index') }}">Volver a la lista</a>
            </div>
        </div>
    </div>
@endsection
