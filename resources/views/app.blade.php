<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
html, body {
    height: 100%;
    margin: 0;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-image: url('/images/fondo.jpg');
    background-size: cover;
    background-repeat: no-repeat;
}

.content {
    flex: 1;  /* Ajusta para que ocupe el espacio disponible empujando el footer hacia abajo */
    display: flex;
    flex-direction: column;
}

footer {
    background-color: #343a40; /* Gris oscuro */
    opacity: 0.9;
    color: white;
    text-align: center;

}

footer a {
    color: #f8f9fa; /* Blanco suave */
    text-decoration: none;  /* Sin subrayado */
}

footer a:hover {
    text-decoration: underline; /* Subrayado al pasar el mouse */
}

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}">about</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/articulos') }}">Artículos en Venta</a>
            </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('/articulos/create') }}" class="btn btn-primary">Añadir Nuevo Artículo</a>
                  </li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>



      <div class="content">
        @yield('content')
    </div>




        <footer class="bg-dark text-white mt-4">
            <div class="container-fluid py-3">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Sección 1</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Enlace 1</a></li>
                            <li><a href="#" class="text-white">Enlace 2</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Sección 2</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Enlace 3</a></li>
                            <li><a href="#" class="text-white">Enlace 4</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Contacto</h5>
                        <ul class="list-unstyled">
                            <li>Email: info@ejemplo.com</li>
                            <li>Teléfono: 123-456-7890</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center small">©2024 Derechos Reservados</div>
            </div>
    </footer>
</body>
</html>
    
</body>

</html>
