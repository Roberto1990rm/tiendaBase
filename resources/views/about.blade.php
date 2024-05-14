@extends('app')

@section('content')
<div class="container mt-4 about-page">
    <h1 class="mb-4 text-center">Sobre Nosotros</h1>
    <div class="row">
        <div class="col-md-6 mb-4 text-center">
            <h2>Nuestra Misión</h2>
            <p>
                En Mi Tienda, nos dedicamos a ofrecer los mejores productos a los precios más competitivos. Creemos en la calidad, la innovación y la satisfacción del cliente. Nuestro objetivo es convertirnos en el destino favorito para todos tus artículos favoritos.
            </p>
        </div>
        <div class="col-md-6 mb-4">
            <img src="{{ asset('images/fondo.jpg') }}" class="img-fluid" alt="Nuestra misión" style="height: 500px; object-fit: cover;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="{{ asset('images/fondo.jpg') }}" class="img-fluid" alt="Nuestro equipo" style="height: 500px; object-fit: cover;">
        </div>
        <div class="col-md-6 mb-4 text-center">
            <h2>Nuestro Equipo</h2>
            <p>
                Contamos con un equipo de profesionales apasionados y dedicados, siempre dispuestos a ayudarte. Nuestro equipo está comprometido con la excelencia y se esfuerza por brindar un servicio excepcional en cada interacción.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4 text-center">
            <h2>Nuestra Historia</h2>
            <p>
                Mi Tienda comenzó como una pequeña empresa con una gran visión. A lo largo de los años, hemos crecido y evolucionado, pero nuestra dedicación a la calidad y al servicio al cliente sigue siendo la misma. Estamos orgullosos de nuestro viaje y esperamos seguir creciendo con ustedes.
            </p>
        </div>
        <div class="col-md-6 mb-4">
            <img src="{{ asset('images/fondo.jpg') }}" class="img-fluid" alt="Nuestra historia" style="height: 500px; object-fit: cover;">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Contáctanos</h2>
            <p class="text-center">
                ¿Tienes alguna pregunta o necesitas ayuda? No dudes en <a href="{{ url('/contact') }}">contactarnos</a>. Estamos aquí para asistirte.
            </p>
        </div>
    </div>
</div>
@endsection
