@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gallinas</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('flocks.create') }}" class="btn btn-success mb-3">Crear nueva gallina</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>No Crías</th>
                                <th>Propósito</th>
                                <th>Tipo de adquisición</th>
                                <th>Nota adicional</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flocks as $flock)
                                <tr>
                                    <td>{{ $flock->name }}</td>
                                    <td>{{ $flock->number_of_chickens }}</td>
                                    <td>{{ $flock->flock_purpose }}</td>
                                    <td>{{ $flock->acquisition_type }}</td>
                                    <td>{{ $flock->additional_notes }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info">Editar</button>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection