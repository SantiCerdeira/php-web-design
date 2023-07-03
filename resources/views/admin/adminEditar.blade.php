<?php
/**@var  \Illuminate\Support\ViewErrorBag  $errors*/
/**@var  \App\Models\Articulo  $articulo*/
/**@var  \Illuminate\Database\Eloquent\Collection | \App\Models\Usuario[] $usuarios*/
/**@var  \Illuminate\Database\Eloquent\Collection | \App\Models\Categoria[] $categorias*/
?>

@extends('layouts/admin')

@section('title', 'Editar ' . $articulo->titulo)

@section('main')
<section class="container my-3">
    <h1>Editar "{{ $articulo->titulo }}"</h1>
    <p>Complete los datos de la articulo que quiera agregar</p>

    @if($errors->any())
        <div class="text-danger mb-3">Se ha encontrado un error en los datos. Por favor, ingrese los datos correctamente</div>
    @endif

    <form action="{{route('admin.articulos.editar', ['id' => $articulo->articulo_id ])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="mb-1" for="titulo">Título (*)</label>
            <input 
                id="titulo" 
                name="titulo" 
                type="text" 
                class="form-control mb-2 @error('titulo') is-invalid @enderror" 
                value="{{ old('titulo', $articulo->titulo) }}"
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
            >{{old('descripcion', $articulo->descripcion)}}</textarea>
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
                value="{{ old('cuerpo') }}"
                @error('cuerpo') aria-describedby="error-cuerpo" @enderror
            >{{old('cuerpo', $articulo->cuerpo)}}</textarea> 
            @error('cuerpo')
                <div class="text-danger mb-3" id="error-cuerpo">{{$message}}</div>
            @enderror
            <p class="aclaracion" id="aclaracion-cuerpo">El cuerpo debe tener al menos 30 caracteres</p>
        </div>

        <div class="mb-3" id="portada-actual">
            <p>Portada actual:</p>
            @if($articulo->portada != null && file_exists(public_path('img/' . $articulo->portada)))
                <img src="{{ url('img/' . $articulo->portada) }}" alt="" class="mw-100">
            @else   
                <p><i>No hay portada</i></p>
            @endif
            <p class="my-2"><i>Si no quiere cambiar la portada, deje el campo vacío.</i></p>
        </div>

        <div class="mb-3">
            <label class="mb-1" for="portada">Portada</label>
            <input 
                id="portada" 
                name="portada" 
                type="file" 
                class="form-control mb-2" 
                aria-describedby = "portada-actual"
            >
        </div>

        <div class="mb-3">
            <label class="mb-1" for="portada_descripcion">Descripción de la portada</label>
            <input 
                id="portada_descripcion" 
                name="portada_descripcion" 
                type="text" 
                class="form-control mb-2 @error('portada_descripcion') is-invalid @enderror" 
                value="{{ old('portada_descripcion', $articulo->portada_descripcion) }}"
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
                        @selected($categoria->categoria_id == old('categoria_id', $articulo->categoria_id))
                    >
                        {{ $categoria->nombre}}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="text-danger mb-3" id="error-categoria_id">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="mb-1" for="usuario_id">Autor (*)</label>
            <select 
                id="usuario_id" 
                name="usuario_id" 
                class="form-control mb-2 @error('usuario_id') is-invalid @enderror" 
                @error('usuario_id') aria-describedby="error-usuario_id" @enderror
            >
                @foreach($usuarios as $usuario)
                    @if($usuario->rol == 1)
                        <option 
                            value="{{ $usuario->usuario_id }}"
                            @selected($usuario->usuario_id == old('usuario_id', $articulo->usuario_id))
                        > 
                            {{ $usuario->nombre }} {{ $usuario->apellido }} 
                        </option>
                    @endif
                @endforeach
            </select>
            @error('usuario_id')
                <div class="text-danger mb-3" id="error-usuario_id">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="mb-1" for="fecha_publicacion">Fecha de publicación (*)</label>
            <input 
                id="fecha_publicacion" 
                name="fecha_publicacion" 
                type="date" 
                class="form-control mb-2 @error('fecha_publicacion') is-invalid @enderror" 
                value="{{ old('fecha_publicacion', $articulo->fecha_publicacion) }}"
                @error('fecha_publicacion') aria-describedby="error-fecha_publicacion" @enderror
            >
            @error('fecha_publicacion')
                <div class="text-danger mb-3" id="error-fecha_publicacion">{{$message}}</div>
            @enderror
        </div>

        <p>* Los campos son obligatorios.</p>

        <button type="submit" class="btn btn-primary my-3">Guardar</button>
    </form>
</section>
@endsection