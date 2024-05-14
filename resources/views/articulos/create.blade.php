@extends('app')

@section('content')
<div class="container">
    <h1>Agregar Nuevo Artículo</h1>
    <form method="POST" action="{{ url('/articulos') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="unidades" class="form-label">Unidades</label>
            <input type="number" class="form-control" id="unidades" name="unidades" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
