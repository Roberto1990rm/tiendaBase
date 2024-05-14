<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
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

        .navbar-custom {
            background-color: #343a40; /* Fondo gris oscuro */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
        }

        .navbar-brand, .nav-link {
            color: #f8f9fa !important; /* Texto blanco suave */
        }

        .nav-link:hover {
            color: #d4d4d4 !important; /* Texto gris claro al pasar el mouse */
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
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/fondo.jpg" alt="Tienda" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/articulos') }}">Artículos en Venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Más
                        </a>
                        <ul class="dropdown-menu">
                            
                            @auth
                            <li><a href="{{ url('/articulos/create') }}" class="dropdown-item">Nuevo Artículo</a></li>
                            @endauth

                            <li><a class="dropdown-item" href="#">Otra acción</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Algo más aquí</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <form class="d-flex" role="search" action="{{ route('buscar') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="query" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
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
