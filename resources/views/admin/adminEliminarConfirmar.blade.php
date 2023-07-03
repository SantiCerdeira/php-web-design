<?php
/**@var  \App\Models\Articulo  $articulo*/
?>

@extends('layouts/admin')

@section('title', 'Eliminar ' . $articulo->titulo)

@section('main')
<section class="container my-3">
    <article>
        <h1>Eliminar "{{ $articulo->titulo}}"</h1>
    
        @include('_articuloData')

        <h2>¿Desea confirmar la eliminación de esta articulo?</h2>
        <form action="{{ route('admin.articulos.eliminar', ['id' => $articulo->articulo_id]) }}" method="post">
            @csrf
            <button class="btn btn-danger p-2 my-2">Eliminar</button>
        </form>
    </article>
</section>
@endsection