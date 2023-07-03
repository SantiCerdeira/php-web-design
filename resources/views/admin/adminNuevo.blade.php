<?php
/**@var  \Illuminate\Support\ViewErrorBag  $errors*/
/**@var  \Illuminate\Database\Eloquent\Collection | \App\Models\Categoria[] $categorias*/
?>

@extends('layouts/admin')

@section('title', 'Ingresa un nuevo articulo')

@section('main')
<section class="container my-3">
    <h1>Agregar un nuevo articulo</h1>
    <p>Complete los datos del articulo que quiera agregar</p>

    @if($errors->any())
        <div class="text-danger mb-3">Se han encontrado errores. Por favor, ingrese los datos correctamente</div>
    @endif

    <form action="{{route('admin.articulos.nuevoCrear')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="mb-1" for="titulo">Título (*)</label>
            <input 
                id="titulo" 
                name="titulo" 
                type="text" 
                class="form-control mb-2 @error('titulo') is-invalid @enderror" 
                value="{{ old('titulo') }}"
                @error('titulo') aria-describedby="error-titulo" @enderror
            >
            @error('titulo')
                <div class="text-danger mb-3" id="error-titulo">{{$message}}</div>
            @enderror
            <p class="aclaracion" id="aclaracion-titulo">El título debe tener al menos 10 caracteres</p>
        </div>

        <div class="mb-3">
            <label class="mb-1" for="descripcion">Descripción</label>
            <textarea 
                id="descripcion" 
                name="descripcion" 
                type="text" 
                class="form-control mb-2 @error('descripcion') is-invalid @enderror" 
                @error('descripcion') aria-describedby="error-descripcion" @enderror
            >{{old('descripcion')}}</textarea>
            @error('descripcion')
                <div class="text-danger mb-3" id="error-descripcion">{{$message}}</div>
            @enderror
        </div>   

        <div class="mb-3">
            <label class="mb-1" for="cuerpo">Cuerpo (*)</label>
            <textarea 
                id="cuerpo" 
                name="cuerpo" 
                type="text" 
                class="form-control mb-2 @error('cuerpo') is-invalid @enderror" 
                @error('cuerpo') aria-describedby="error-cuerpo" @enderror
            >{{old('cuerpo')}}</textarea>
            @error('cuerpo')
                <div class="text-danger mb-3" id="error-cuerpo">{{$message}}</div>
            @enderror
            <p class="aclaracion" id="aclaracion-cuerpo">El cuerpo debe tener al menos 30 caracteres</p>
        </div>   

        <div class="mb-3">
            <label class="mb-1" for="portada">Portada</label>
            <input 
                id="portada" 
                name="portada" 
                type="file" 
                class="form-control mb-2" 
            >
        </div>

        <div class="mb-3">
            <label class="mb-1" for="portada_descripcion">Descripción de la portada</label>
            <input 
                id="portada_descripcion" 
                name="portada_descripcion" 
                type="text" 
                class="form-control mb-2 @error('portada_descripcion') is-invalid @enderror" 
                value="{{ old('portada_descripcion') }}"
                @error('portada_descripcion') aria-describedby="error-portada_descripcion" @enderror
            >
            @error('portada_descripcion')
                <div class="text-danger mb-3" id="error-portada_descripcion">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="mb-1" for="categoria_id">Categoría (*)</label>
            <select 
                id="categoria_id" 
                name="categoria_id" 
                class="form-control mb-2 @error('categoria_id') is-invalid @enderror" 
                @error('categoria_id') aria-describedby="error-categoria_id" @enderror
            >
                @foreach($categorias as $categoria)
                    <option 
                        value="{{ $categoria->categoria_id }}"
                    >
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="text-danger mb-3" id="error-categoria_id">{{$message}}</div>
            @enderror
        </div>
    
        <input 
            id="usuario_id" 
            name="usuario_id" 
            type="hidden"
            value="{{Auth::user()->usuario_id}}">

        <input 
            id="fecha_publicacion" 
            name="fecha_publicacion" 
            type="hidden" 
            value="{{date("Y-m-d")}}">

        <p>* Los campos son obligatorios.</p>

        <button type="submit" class="btn btn-primary my-3">Agregar</button>
    </form>
</section>
@endsection