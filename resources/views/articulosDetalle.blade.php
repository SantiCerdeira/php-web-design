<?php
/**@var  \App\Models\Articulo  $articulo*/
?>

@extends('layouts/main')

@section('title', $articulo->titulo)

@section('main')
<article class="articuloDetalle container my-3 bg-white bg-gradient mx-auto">
    <h1 class="text-center my-2">{{ $articulo->titulo}}</h1>
    <p class="w-75 mx-auto text-center my-2">{{$articulo->descripcion}}</p>
    <figure>
        <img src="{{ url('img/' . $articulo->portada) }}" alt="{{$articulo->portada_descripcion}}" class="imagenPortada my-4">
    </figure>
    <div class="w-75 mx-auto my-3 renglones">{!!$articulo->cuerpo!!}</div>
    <p class="w-75 mx-auto my-3 text-end">Escrito por: {{$articulo->usuario->nombre}} {{$articulo->usuario->apellido}}</p>
</article>
@endsection