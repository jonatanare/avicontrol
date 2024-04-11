@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Editar registro de huevos</h1>

            <form action="{{ route('eggs.update', $egg->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="collection_range" class="form-label">Rango de colección:</label>
                    <select name="collection_range" id="collection_range" class="custom-select">
                        <option value="notSpecified" @if ($egg->collection_range == 'notSpecified') selected @endif>No especificado</option>
                        <option value="specifiedBatch" @if ($egg->collection_range == 'specifiedBatch') selected @endif>Lote específico</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="collection_date" class="form-label">Fecha de colección:</label>
                    <input type="date" name="collection_date" id="collection_date" value="{{ $egg->collection_date }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="good_eggs" class="form-label">Huevos buenos:</label>
                    <input type="number" name="good_eggs" id="good_eggs" value="{{ $egg->good_eggs }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="bad_eggs" class="form-label">Huevos malos:</label>
                    <input type="number" name="bad_eggs" id="bad_eggs" value="{{ $egg->bad_eggs }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="additional_notes" class="form-label">Notas adicionales:</label>
                    <input type="text" name="additional_notes" id="additional_notes" class="form-control" value="{{ $egg->additional_notes }}">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                    <a href="{{ route('eggs.show', $egg->id) }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>

            
        </div>
    </div>
</div>

@endsection
