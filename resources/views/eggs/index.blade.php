@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Lista de huevos</h1>

                <a href="{{ route('eggs.create') }}" class="btn btn-success mb-4">Crear nuevo registro de huevos</a>

                <table  class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rango de colección</th>
                            <th>Fecha de colección</th>
                            <th>Huevos buenos</th>
                            <th>Huevos malos</th>
                            <th>Notas adicionales</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eggs as $egg)
                            <tr>
                                <td>{{ $egg->id }}</td>
                                <td>
                                    <span class="p-1 {{ $egg->collection_range === 'notSpecified' ? 'badge badge-info' : 'badge badge-success'}}">
                                        {{ $egg->collection_range === 'notSpecified' ? 'No específico': 'Lote específico' }}

                                    </span>
                                </td>
                                <td>{{ $egg->collection_date }}</td>
                                <td>{{ $egg->good_eggs }}</td>
                                <td>{{ $egg->bad_eggs }}</td>
                                <td>{{ $egg->additional_notes }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('eggs.show', $egg->id) }}">Ver</a>
                                    <a class="btn btn-secondary" href="{{ route('eggs.edit', $egg->id) }}">Editar</a>
                                    <form action="{{ route('eggs.destroy', $egg->id) }}" method="POST"
                                        style="display: inline;">
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
