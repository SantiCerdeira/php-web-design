<?php
/**@var  \App\Models\Articulo  $articulo*/
?>

@extends('layouts/admin')

@section('title', $articulo->titulo)

@section('main')
<section class="container my-3">
    <article>
        <h1>{{ $articulo->titulo}}</h1>

        @include('_articuloData')
    </article>
</section>
@endsection