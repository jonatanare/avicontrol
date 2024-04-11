@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Editar alimento</h1>

                <form action="{{ route('feeds.update', $feed->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="MB-3">
                        <label class="form-label" for="addition_range">Rango de adición:</label>
                        <select name="addition_range" id="addition_range" class="custom-select">
                            <option value="notSpecified" @if ($feed->addition_range == 'notSpecified') selected @endif>No específico</option>
                            <option value="specifiedBatch" @if ($feed->addition_range == 'specifiedBatch') selected @endif>Lote específico</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="addition_date">Fecha de adición:</label>
                        <input class="form-control" type="date" name="addition_date" id="addition_date" value="{{ $feed->addition_date }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="feed_type">Tipo de alimento:</label>
                        <input class="form-control" type="text" name="feed_type" id="feed_type" value="{{ $feed->feed_type }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="quantity">Cantidad:</label>
                        <input class="form-control" type="number" step="0.01" name="quantity" id="quantity" value="{{ $feed->quantity }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="additional_notes">Notas adicionales:</label>
                        <input class="form-control" type="text" name="additional_notes" id="additional_notes"
                            value="{{ $feed->additional_notes }}">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                        <a href="{{ route('feeds.show', $feed->id) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
@endsection
