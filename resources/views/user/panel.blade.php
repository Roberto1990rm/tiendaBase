@extends('app')

@section('content')
<div class="container mt-4">
    @if (auth()->user()->is_admin)
        <div class="alert alert-info">
            Este es un perfil de usuario administrador.
        </div>
    @endif

    @if (auth()->user()->is_admin)
    <div class="alert alert-info">
        Como administrador ves todos los artículos de todos los usuarios y puedes decidir si hacerlos públicos o no. 
    </div>
@endif

    <h1 class="mb-4">Mis Artículos</h1>
    @if ($articulos->isEmpty())
        <p>No has creado ningún artículo.</p>
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
                            <p class="card-text">Descripción: {{ $articulo->descripcion }}</p>
                            <p class="card-text">Estado: {{ $articulo->estado ? 'Activo' : 'Inactivo' }}</p>
                            <p class="card-text">Creador: {{ $articulo->user->name }}</p>
                            <a href="{{ route('articulos.show', $articulo->id) }}" class="btn btn-primary">Ver Detalles</a>

                            @if (auth()->user()->is_admin)
                                <form action="{{ route('articulos.toggleEstado', $articulo->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning">
                                        {{ $articulo->estado ? 'Desactivar' : 'Activar' }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
