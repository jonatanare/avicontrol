@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingresa el nombre" name="name">
                </div>
                <div class="mb-3">
                    <label for="number_of_chickens" class="form-label">Número de crías</label>
                    <input type="number" class="form-control" placeholder="Ingresa el nombre" name="number_of_chickens">
                </div>
                <div class="mb-3">
                    <label for="flock_purpose" class="form-label">Propósito de rebaño</label>
                    <select name="flock_purpose" id="flock_purpose" class="custom-select">
                        <option value="eggs">Huevos</option>
                        <option value="meat">Carne</option>
                        <option value="both">Ambos</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="acquisition_type" class="form-label">Tipo de adquisición</label>
                    <select name="acquisition_type" id="acquisition_type" class="custom-select">
                        <option value="purchasedType">Comprado</option>
                        <option value="giftType">Recibido como regalo</option>
                        <option value="donationType">Recibido como donacion</option>
                        <option value="other">Otra</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date_of_acquisition" class="form-label">Fecha de adquisición</label>
                    <input type="date" class="form-control" placeholder="Ingresa el nombre" name="date_of_acquisition">
                </div>
                <div class="mb-3">
                    <label for="additional_notes" class="form-label">Nota adicional</label>
                    <textarea name="additional_notes" id="additional_notes" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection