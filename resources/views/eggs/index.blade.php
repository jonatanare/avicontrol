@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <a href="{{route('eggs.adjust', ['adjustment_type' => 'add'])}}" class="btn btn-success">
                            <div class="d-flex align-items-center">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAc1JREFUSEuNVrtNBEEMfW/bQEJCBFAEHRBcMyR0wDV0TZCRkCGQyJAoYQ3zsz073ptb6aSVz55nP9tvlkgPAUh+69+rydvN1QftxTIf3T9B3IAz8bGECA4ZBdVkU7Xbe48y+FQUrUBEDgK8UHCvdSXaisfr/++R5E+XHWTObEOWdf0GeJUjaCc7et4BPJD8HWjdNbgeiEhr85l4D5yyj5qIlMgTyVMqX3ugAEPy1RDYDaD3EeBjIW/bUOaMRVbJiAuZOsrE72R8/YA0f1kLFQtz7mMFBcCvw8UofaINoBHeKGoA0X6k7EpWKbt4GbbnlCEkIGulqCJHndbgiU9Hka8g/1F7YNphMpCSSI1VfnUBrRrtZa3SL1rXnC11Y0VlcgpdRlhMUZ6iyq+vIFO3tx9lD0rFFcD5e+Dafd/AQd7Ux/iNtagf07aIAbJpjoH1/FrWKkgDE03KKoDvvh1bl84H741pRJGJXdCDoIx4+v0U9VQPWtRt8t4Sn7lwtrtSAEppXwJcx0qtQ6sXxESyP0nebLXoAOAI4G4bHF8Rvbw6nzcBnpeFpza+et4lV61vvt/2vY8B1SI/alshG2Q5UMIs15F9nrW/7SfMB/v5B86nJjAL0BlbAAAAAElFTkSuQmCC"/>
                            <span class="ml-2 mb-0">Addición rápida</span>
                            </div>
                            
                            
                        </a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('eggs.adjust', ['adjustment_type' => 'subtract'])}}" class="btn btn-info">
                            <div class="d-flex align-items-center">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAcpJREFUSEuFVktOAzEMfZ5rICEQCzgEN2DBZdhwA7hQL8GOTXe0SOyQOEKN7PzsxJlk0U4nGT/7+flNCZNFAFg/ggN5k8B5m9Cu8/n8rHwt1y6OPh0A1Ps1vD/UKjCpuGpmsALXqq8VMPMzgDcAD8ILa1Z1fYDxRBv9DmEHfH8ixSCAL/wD4KqElGQ7/o4AHonor5yZgZWY0kRTwYVt1hZguM43giQk9pGBl22jgyjAUhTppZE0iRYphIGvjehOySllMrMCEMktW/yimRYhUW3iRAAbiaQNxBygcd3OS6KCsGmc0oOMrBtawXytZoL5ouklJkoPhtIWFPVCNxVXAMNElmlSUSnNesTMNgIcxBXI5LkmJ4qY+QbgUxPboM8zEd0WKmR3F6DvQQLAKaGNkwcgAzSb6RN1c2ABWhdmRuY9pzmCbXKnIjsH1n5XyrGaGypYD9ps7ALYQO6DF0VzYOlq6optfLcHSlHWr53SRsHaNiqAm4MkyW8Grt0YBzaqjjuz2iw3Bp03la+za33hvAO4rxlrIKv9haWm7U8Ar0R0cFYRvtwzUtwDb6OquqAt9Y3WO6j9xzDYRmfRNblYWDstDDwv8h8vZP/rH7s4Gy1PTgOsAAAAAElFTkSuQmCC"/>
                                <span class="ml-2 text-white">Reducción rápida</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
