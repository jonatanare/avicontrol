@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Editar feed</h1>

                <form action="{{ route('feeds.update', $feed->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="addition_range">Rango de adición:</label>
                        <select name="addition_range" id="addition_range">
                            <option value="morning" @if ($feed->addition_range == 'morning') selected @endif>Mañana</option>
                            <option value="afternoon" @if ($feed->addition_range == 'afternoon') selected @endif>Tarde</option>
                            <option value="evening" @if ($feed->addition_range == 'evening') selected @endif>Noche</option>
                            <option value="night" @if ($feed->addition_range == 'night') selected @endif>Medianoche</option>
                        </select>
                    </div>

                    <div>
                        <label for="addition_date">Fecha de adición:</label>
                        <input type="date" name="addition_date" id="addition_date" value="{{ $feed->addition_date }}"
                            required>
                    </div>

                    <div>
                        <label for="feed_type">Tipo de alimento:</label>
                        <input type="text" name="feed_type" id="feed_type" value="{{ $feed->feed_type }}" required>
                    </div>

                    <div>
                        <label for="quantity">Cantidad:</label>
                        <input type="number" step="0.01" name="quantity" id="quantity" value="{{ $feed->quantity }}"
                            required>
                    </div>

                    <div>
                        <label for="additional_notes">Notas adicionales:</label>
                        <input type="text" name="additional_notes" id="additional_notes"
                            value="{{ $feed->additional_notes }}">
                    </div>

                    <button type="submit">Guardar cambios</button>
                </form>

                <a href="{{ route('feeds.show', $feed->id) }}">Cancelar</a>
            </div>
        </div>
    </div>
@endsection
