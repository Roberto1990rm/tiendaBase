@extends('app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4" style="text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);">Artículos en Venta</h1>
    <div class="row">
        @foreach ($articulos as $articulo)
            <div class="col-md-6 mb-4">
                <div class="card">
                    @if ($articulo->imagen)
                        <img src="{{ asset('images/' . $articulo->imagen) }}" class="card-img-top" alt="{{ $articulo->nombre }}">

                    @else
                        <img src="https://via.placeholder.com/50" class="card-img-top" alt="No image available">
                    @endif
                    <div class="card-body" style="color: black; background-color: white;">
                        <h5 class="card-title">{{ $articulo->nombre }}</h5>
                        <p class="card-text">Precio: ${{ $articulo->precio }}</p>
                        <p class="card-text">Unidades: {{ $articulo->unidades }}</p>
                        <a href="{{ route('articulos.show', $articulo->id) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
                
            </div>
        @endforeach
    </div>
</div>
@endsection
