<?php
// /** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Articulo[] $articulos */
?>

@extends('layouts/main')

@section('title', 'Bienvenido a WebExpert')

@section('main')
<section class="p-3">
    <h1 class="m-2 text-center text-white">Asesoría personalizada de sitios web</h1>
    <article class="container-xxl text-white">
        <p class="fs-6 text-center w-75 mx-auto">Revisamos su sitio web para poder hacerle todas las recomendaciones necesarias para que pueda corregir aspectos de sus sitios web y así mejorar la experiencia de sus usuarios y aumentar sus ventas y conversiones.</p>
        <figure class="d-flex justify-content-center">
            <img src="<?=url('img/hombreComputadora.png') ;?>" alt="Persona trabajando" width="500" height="500">
        </figure>
    </article>
</section>

<section class="p-4 bg-light bg-gradient text-dark">
    <h2 class="text-center fs-1">¿Qué ofrece WebExpert?</h2>
    <p class="text-center">Disfruta de todas las ventajas de contratar uno de nuestros servicios</p>
    <article class="my-5 fs-5 d-flex flex-wrap justify-content-center container">
        <div class="col-11 col-md-5 text-center my-4 mx-3 p-2 servicios">
            <ion-icon name="people-outline" class="fs-1"></ion-icon>
            <p>Atención personalizada. Profesionales revisarán su sitio web en busqueda de mejoras</p>
        </div>
        <div class="col-11 col-md-5 text-center my-4 mx-3 p-2 servicios">
            <ion-icon name="time-outline" class="fs-1"></ion-icon>   
            <p>Luego del pago, le enviamos tu video o nos reunimos con usted en menos de 72 horas</p>
        </div>
        <div class="col-11 col-md-5 text-center my-4 mx-3 p-2 servicios">
            <ion-icon name="bag-check-outline" class="fs-1"></ion-icon>
            <p>Garantía de 30 días. Si no aumentan sus conversiones te devolvemos el dinero</p>
        </div>
        <div class="col-11 col-md-5 text-center my-4 mx-3 p-2 servicios">
            <ion-icon name="star" class="fs-1"></ion-icon>
            <p>Una enorme cantidad de reseñas positivas por parte de nuestros clientes</p>
        </div>
    </article>
    <div class="d-flex justify-content-center">
        <a href="<?= route('contratar');?>" class="btn btn-dark text-center mx-auto fs-5 p-3 m-2 boton">Contratar WebExpert</a>
    </div>
</section>

<section class="p-5">
    <div class="container-xxl text-white">
        <h2 class="m-2 text-center fs-1">Nuestro blog</h2>
        <p class="fs-6 text-center w-75 mx-auto">En nuestro blog le ofrecemos una gran variedad de artículos relacionados al diseño web y a la experiencia de usuario. Entre a alguno de estos artículos o ingresa nuestro blog y mira la lista completa.</p>
        @if($articulos != null)
            <div class="d-flex flex-wrap justify-content-between mx-auto my-4">
                @foreach($articulos as $articulo)
                    <article class="articulo col-11 col-xl-5 bg-light bg-gradient p-4 my-3 mx-auto text-dark text-center d-flex flex-column justify-content-between articuloBlog">
                        <figure>
                            <img src="{{ url('img/' . $articulo->portada) }}" alt="{{$articulo->portada_descripcion}}" class="mx-auto portadas">
                        </figure>
                        <h3 class="my-3"><a href="{{ route('articulos.detalle', ['id' => $articulo->articulo_id]) }}"  class="text-decoration-none text-dark">{{$articulo->titulo}}</a></h3>
                        <p class="fst-italic">Escrito por: {{$articulo->usuario->nombre}} {{$articulo->usuario->apellido}}</p>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        <a href="<?= route('articulos');?>" class="btn btn-dark text-center mx-auto fs-5 p-3 m-2 boton">Ir al blog</a>
    </div>
</section>

<section class="p-4 bg-light bg-gradient text-dark">
    <h2 class="text-center fs-1">Opiniones de nuestros clientes</h2>
    <p class="text-center">Lee las opiniones y reseñas de los clientes para saber qué experiencia tuvieron con nosotros</p>
    <div class="my-5 fs-5 d-flex flex-wrap justify-content-center container-fluid">
        <article class="col-11 col-xl-4 text-center my-4 mx-3 p-3 d-flex justify-content-evenly opinion flex-column flex-lg-row">
            <figure class="col-lg-4 my-auto">
                <img src="<?=url('img/caraHombre1.jpeg') ;?>" alt="" width="80" height="80">
                <figcaption>Pedro Gomez</figcaption>
            </figure>
            <hr>
            <div class="d-flex flex-column col-lg-6">
                <p class="my-auto testimonio">Excelente servicio. Contraté el video personalizado para poder encontrar mejoras para mi sitio y mis ventas han aumentado más de un 500% cuando las puse en práctica. Altamente recomendado.</p>
                <div>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
            </div>
        </article>
        <article class="col-11 col-xl-4 text-center my-4 mx-3 p-3 d-flex justify-content-evenly opinion flex-column flex-lg-row">
            <figure class="col-lg-4 my-auto">
                <img src="<?=url('img/caraMujer1.jpeg') ;?>" alt="" width="80" height="80">
                <figcaption>Marcela Nuñez</figcaption>
            </figure>
            <hr>
            <div class="d-flex flex-column col-lg-6">
                <p class="my-auto testimonio">Muy buen servicio. Estuve en una reunión virtual con miembros del equipo y me ayudron muchísimo a mejorar la experiencia de usuario en mi sitio web.</p>
                <div>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
            </div>
        </article>
        <article class="col-11 col-xl-4 text-center my-4 mx-3 p-3 d-flex justify-content-evenly opinion flex-column flex-lg-row">
            <figure class="col-lg-4 my-auto">
                <img src="<?=url('img/caraHombre2.jpeg') ;?>" alt="" width="80" height="80">
                <figcaption>Miguel Gonzalez</figcaption>
            </figure>
            <hr>
            <div class="d-flex flex-column col-lg-6">
                <p class="my-auto testimonio">Tan solo habiendo contratado el video personalizado me fue más que suficiente para poder llevar mi sitio al próximo nivel y aumentar así mi porcentaje de conversiones. Totalmente recomendable.</p>
                <div>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half"></ion-icon>
                </div>
            </div>
        </article>
        <article class="col-11 col-xl-4 text-center my-4 mx-3 p-3 d-flex justify-content-evenly opinion flex-column flex-lg-row">
            <figure class="col-lg-4 my-auto">
                <img src="<?=url('img/caraMujer2.jpeg') ;?>" alt="" width="80" height="80">
                <figcaption>Tamara Martinez</figcaption>
            </figure>
            <hr>
            <div class="d-flex flex-column col-lg-6">
                <p class="my-auto testimonio">La reunión con el equipo de WebExpert me ayudó a aprender en tan solo un par de horas lo que de otra forma me hubiera tomado meses enteros, mi negocio no es el mismo desde entonces, mis ventas no paran de crecer.</p>
                <div>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection
