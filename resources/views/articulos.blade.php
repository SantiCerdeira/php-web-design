<?php
/** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Articulo[] $articulos */
?>
@extends('layouts/main')

@section('title', 'Blog de WebExpert')

@section('main')
<section class="seccionesLargoMinimo">
    <h1 class="fs-1 text-center mt-3 p-3 text-white">Blog de WebExpert</h1>
    @if(count($articulos) == 0)
        <div class="d-flex flex-column justify-content-center">
            <h2 class="fs-2 text-center mt-5 p-3 text-white">Por el momento no hay artículos en nuestro blog... :(</h2>
            <a href="<?= route('inicio');?>" class="btn btn-dark p-3 fs-4 w-50 mx-auto my-3 boton">Volver al inicio</a>
        </div>
    @else
        <h2 class="visually-hidden">Lista de artículos</h2>
            <div class="d-flex justify-content-lg-around row my-4 mx-auto">
                @foreach($articulos as $articulo)
                    <article class="col-10 col-md-5 col-xl-3 mx-auto mx-xl-3 my-4 card p-1 d-flex text-center fondo items d-flex flex-column justify-content-between articuloBlog">
                        <figure>
                            <img src="{{ url('img/' . $articulo->portada) }}" alt="{{$articulo->portada_descripcion}}" class="mx-auto portadas">
                        </figure>
                        <h2 class="my-3"><a href="{{ route('articulos.detalle', ['id' => $articulo->articulo_id]) }}"  class="text-decoration-none text-dark">{{$articulo->titulo}}</a></h2>
                        <p class="fst-italic">Escrito por: {{$articulo->usuario->nombre}} {{$articulo->usuario->apellido}}</p>
                    </article>
                @endforeach
            </div>
    @endif
</section>
@endsection