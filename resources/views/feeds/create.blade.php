@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Agregar nuevo alimento</h1>

            <form action="{{ route('feeds.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="addition_range">Rango de adición:</label>
                    <select name="addition_range" id="addition_range" class="custom-select">
                        <option value="notSpecified">No específico</option>
                        <option value="specifiedBatch">Lote específico</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="addition_date">Fecha de adición:</label>
                    <input class="form-control" type="date" name="addition_date" id="addition_date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="feed_type">Tipo de alimento:</label>
                    <input class="form-control" type="text" name="feed_type" id="feed_type" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="quantity">Cantidad:</label>
                    <input class="form-control" type="number" step="0.01" name="quantity" id="quantity" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="additional_notes">Notas adicionales:</label>
                    <textarea name="additional_notes" id="additional_notes" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Agregar</button>
            </form>
        </div>
    </div>
</div>

@endsection
