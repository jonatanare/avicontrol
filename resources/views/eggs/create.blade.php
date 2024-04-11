@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Crear nuevo registro de huevos</h1>

            <form action="{{ route('eggs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="collection_range" class="form-label">Rango de colección:</label>
                    <select name="collection_range" id="collection_range" class="custom-select">
                        <option value="notSpecified">No especificado</option>
                        <option value="specifiedBatch">Lote específico</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="collection_date" class="form-label">Fecha de colección:</label>
                    <input type="date" name="collection_date" id="collection_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="good_eggs" class="form-label">Huevos buenos:</label>
                    <input type="number" name="good_eggs" id="good_eggs" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="bad_eggs" class="form-label">Huevos malos:</label>
                    <input type="number" name="bad_eggs" id="bad_eggs" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="additional_notes" class="form-label">Notas adicionales:</label>
                    <textarea name="additional_notes" id="additional_notes" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100">Crear</button>
            </form>
        </div>
    </div>
</div>

@endsection
