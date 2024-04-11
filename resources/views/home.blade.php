@extends('layouts.app')

@section('content')
<div class="container dashboard">
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <section class="d-flex justify-content-between">
                <div class="dashboard__card">
                    <div class="">
                        <img src="{{asset('/img/gallina_inventario.png')}}" alt="Gallina inventario" />
                    </div>

                    <a href="/flocks"><h2>Gallinas</h2></a>
                </div>
                <div class="dashboard__card">
                    <div class="">
                        <img src="{{asset('/img/huevos_inventario.png')}}" alt="Gallina inventario" />
                    </div>

                    <a href="/eggs"><h2>Huevos</h2></a>
                </div>
                <div class="dashboard__card">
                    <div class="">
                        <img src="{{asset('/img/alimentos_para_aves_inventario.png')}}" alt="Gallina inventario" />
                    </div>

                    <a href="/feeds"><h2>Alimentos</h2></a>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
