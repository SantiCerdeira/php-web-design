<?php
/**@var  \App\Models\Articulo  $articulo*/
?>

<div class="row mb-3">
    <div class="col-6">
    @if($articulo->portada != null && file_exists(public_path('img/' . $articulo->portada)))
        <img src="{{ url('img/' . $articulo->portada) }}" alt="{{ $articulo->portada }}" class="mw-100">
        <p class="my-2">{{$articulo->portada_descripcion}}</p>
    @else   
        <img src="{{ url('img/imagenGenerica.jpeg') }}" alt="Imagen genérica" class="mw-100">
        <p><i>Este artículo no tiene imagen</i></p>
    @endif
    </div>
    <div class="col-6">
        <dl>
            <dt>Autor</dt>
            <dd>{{$articulo->usuario->nombre}} {{$articulo->usuario->apellido}}</dd>
            <dt>Fecha de publicación</dt>
            <dd>{{$articulo->fecha_publicacion}}</dd>
        </dl>
    </div>

    <h2>Descripción</h2>
    <p>{{$articulo->descripcion}}</p>

    <h2>Cuerpo</h2>
    <p>{{$articulo->cuerpo}}</p>
</div>