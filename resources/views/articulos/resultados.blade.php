<!-- resources/views/articulos/resultados.blade.php -->
@extends('app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Resultados de la Búsqueda</h1>
    @if($articulos->isEmpty())
        <p>No se encontraron artículos.</p>
    @else
        <div class="row">
            @foreach ($articulos as $articulo)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        @if ($articulo->imagen)
                            <img src="{{ asset('images/' . $articulo->imagen) }}" class="card-img-top" alt="{{ $articulo->nombre }}">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="No image available">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $articulo->nombre }}</h5>
                            <p class="card-text">Precio: ${{ $articulo->precio }}</p>
                            <p class="card-text">Unidades: {{ $articulo->unidades }}</p>
                            <p class="card-text">{{ $articulo->descripcion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
