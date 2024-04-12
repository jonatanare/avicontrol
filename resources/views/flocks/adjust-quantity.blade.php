@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Ajustar cantidad de feed</h1>

                <form id='adjustForm' method="PATCH">
                    @csrf
                    <div class="mb-3">
                        <label for="flock" class="form-label">Lote</label>
                        <select name="flock" id="flock" class="custom-select">
                            @foreach ($flocks as $flock)
                                <option value="{{$flock->id}}">{{$flock->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="adjustment_type" class="form-label">Tipo de ajuste:</label>
                        <select name="adjustment_type" id="adjustment_type" class="custom-select" required>
                            <option value="add" {{ request()->input('adjustment_type') == 'add' ? 'selected' : '' }}>Sumar</option>
                            <option value="subtract" {{ request()->input('adjustment_type') == 'subtract' ? 'selected' : '' }}>Restar</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad a ajustar:</label>
                        <input type="number" name="quantity" id="quantity" step="0.01" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Ajustar cantidad</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Script de JavaScript para ajustar el action del formulario -->
    <script>
        document.getElementById('adjustForm').addEventListener('submit', function(event) {
            // Obtener el feed ID seleccionado
            const feedId = document.getElementById('flock').value;

            // Modificar el action del formulario para incluir el feed ID en la URL
            this.action = `/flocks/adjust/${feedId}`;
        });
    </script>
@endsection
