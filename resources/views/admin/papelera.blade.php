<?php
/** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Articulo[] | \Illuminate\Pagination\LengthAwarePaginator $articulos */
/** @var  array $paramsBuscar*/
/** @var  string $titulo*/
?>

@extends('layouts/admin')

@section('title', 'Artículos Eliminados | Panel de administración')

@section('main')
<section class="container my-3">
    <h1>Artículos eliminados del blog</h1>
    <a href="{{ route('admin.articulos') }}" class="btn btn-dark fs-4 fw-bold my-3 text-decoration-none text-white">Volver al listado</a>

    <section class="my-4">
        <h2 class="my-2">Buscador:</h2>
        <form action="{{ ('papelera') }}" method="get">
            <div class="my-2">
                <label for="b-titulo" class="form-label">Título</label>
                <input type="text" id="b-titulo" name="titulo" class="form-control" value="{{ $paramsBuscar['titulo'] ?? ''}}">
            </div>
            <button type="submit" class="btn btn-dark p-2 my-2">Buscar</button>
        </form>
    </section>
    
    @if(count($articulos) != 0)
        <article>
            <table class="table table-hover table-bordered mb-2">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Portada</th>
                        <th>Descripción portada</th>
                        <th>Autor</th>
                        <th>Fecha de publicación</th> 
                        <th>Acciones</th> 
                    </tr>    
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->articulo_id }}</td>
                            <td>{{ $articulo->titulo }}</td>
                            <td>{{$articulo->categoria->nombre}}</td> 
                            <td>
                                <img src="{{ url('img/' . $articulo->portada) }}" alt="{{ $articulo->portada }}" class="mw-100 my-2">
                            </td>
                            <td>{{ $articulo->portada_descripcion}}</td>
                            <td>{{ $articulo->usuario->nombre}}</td>
                            <td>{{ $articulo->fecha_publicacion}}</td>
                            <td>
                                <div class="d-flex justify-content-evenly flex-column">
                                    <form action="{{ route('admin.articulos.recuperar', ['id' => $articulo->articulo_id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary my-2 mx-2" type="submit">Recuperar</button>
                                    </form>
                                    <a href="{{ route('admin.articulos.eliminarDefinitivamenteConfirmar', ['id' => $articulo->articulo_id]) }}" class="btn btn-danger my-2 mx-2">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $articulos->links() }}
        </article>
    @elseif(count($articulos) == 0 && $titulo != null)
        <h2 class="text-center my-5">No hay artículos que coincidan con su búsqueda</h2>
    @else
        <h2 class="text-center my-5">No hay artículos en la papelera...</h2>
    @endif

</section>
@endsection