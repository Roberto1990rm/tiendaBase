@extends('app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center text-highlight-yellow">Bienvenido a Nuestra Tienda</h1>
    <p class="text-center text-highlight">Aquí puedes encontrar los mejores artículos a los mejores precios.</p>

    <h2 class="mt-5 mb-3 text-highlight-yellow">Últimos Anuncios</h2>
    <div class="row">
        @foreach ($articulos as $articulo)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    @if ($articulo->imagen)
                    <img src="{{ asset('images/' . $articulo->imagen) }}" class="card-img-top" alt="{{ $articulo->nombre }}">

                @else
                    <img src="https://via.placeholder.com/50" class="card-img-top" alt="No image available">
                @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $articulo->nombre }}</h5>
                        <p class="card-text">{{ $articulo->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $articulo->precio }}</p>
                        <p class="card-text">Unidades: {{ $articulo->unidades }}</p>
                        <a href="{{ route('articulos.show', $articulo->id) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                    <div class="card-footer text-muted">
                        Publicado el {{ $articulo->created_at->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
