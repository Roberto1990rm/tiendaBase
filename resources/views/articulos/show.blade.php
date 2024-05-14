@extends('app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">{{ $articulo->nombre }}</h1>
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
            <p class="card-text">Descripción: {{ $articulo->descripcion }}</p>
            <p class="card-text">Estado: {{ $articulo->estado }}</p>
        </div>
    </div>
</div>
@endsection

