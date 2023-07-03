<?php
/**@var  \App\Models\Servicio[]  $servicios*/
?>

@extends('layouts/main')

@section('title', 'Contratar WebExpert')

@section('main')
<section class="seccionesLargoMinimo">
    <h1 class="fs-1 text-center mt-3 p-3 text-white">Contrata los servicios de WebExpert</h1>
    <div class="d-flex justify-content-center flex-wrap my-3 container">
        @foreach($servicios as $servicio)
            <article class="planes col-11 col-lg-4 mx-3 my-2 d-flex flex-column">
                <h2>{{$servicio->nombre}}</h2>
                <p class="precio">${{$servicio->precio}}</p>
                <p class="mx-4">{{$servicio->descripcion}}</p>
                <a href="{{ route('mp.confirmar', ['servicio_id' => $servicio->servicio_id]) }}" class="btn btn-dark text-center w-75 mx-auto fs-5 p-3 m-2">¡Quiero este servicio!</a>
            </article>
        @endforeach
    </div>
</section>
@endsection