@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="{{route('feeds.adjust')}}">Addición</a>
        </div>
        <div class="col-6">
            <a href="{{route('feeds.adjust')}}">Reducción</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Lista de Alimentos</h1>

            <a href="{{ route('feeds.create') }}" class="btn btn-success mb-4">Agregar nuevo alimento</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rango de adición</th>
                        <th>Fecha de adición</th>
                        <th>Tipo de alimento</th>
                        <th>Cantidad</th>
                        <th>Notas adicionales</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feeds as $feed)
                    <tr>
                        <td>Lote {{ $feed->id }}</td>
                        <td>
                            <span class="p-1 {{ $feed->addition_range === 'notSpecified' ? 'badge badge-info' : 'badge badge-success'}}">
                                {{ $feed->addition_range === 'notSpecified' ? 'No específico': 'Lote específico' }}

                            </span>
                        </td>
                        <td>{{ $feed->addition_date }}</td>
                        <td>{{ $feed->feed_type }}</td>
                        <td>{{ $feed->quantity }}</td>
                        <td>{{ $feed->additional_notes }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('feeds.show', $feed->id) }}">Ver</a>
                            <a class="btn btn-secondary" href="{{ route('feeds.edit', $feed->id) }}">Editar</a>
                            <form action="{{ route('feeds.destroy', $feed->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
