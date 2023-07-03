<?php
/**@var  \Illuminate\Support\ViewErrorBag  $errors*/
/**@var  \App\Models\Servicio[]  $servicios*/
/**@var  $servicio_id*/
?>

@extends('layouts/main')

@section('title', 'Formulario Contratación')

@section('main')
<section>
    <div class="w-100">
        @foreach($servicios as $servicio)
            @if($servicio->servicio_id == $servicio_id)
            <h1 class="fs-1 text-center mt-3 text-white">Formulario de contratación de {{$servicio->nombre}}</h1>
            <h2 class="fs-3 text-center mt-3 text-white">Valor: ${{$servicio->precio}}</h2>
                <form action="{{route('crearCompra')}}" method="post" class="d-flex flex-column p-2 my-3 w-75 mx-auto formulario">
                    @csrf
                    <div class="d-flex flex-column mb-3">
                        <label for="nombre" class="mt-3 mb-2 fw-bold fs-3">Nombre:</label>
                        <input 
                            type="text" 
                            name="nombre" 
                            id="nombre"
                            class="form-control mb-2 @error('nombre') is-invalid @enderror" 
                            value="{{ old('nombre', Auth::user()->nombre) }}"
                            @error('nombre') aria-describedby="error-nombre" @enderror
                        > 
                        @error('nombre')
                            <div class="bg-danger text-white mb-3 p-1" id="error-nombre">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <label for="apellido" class="mt-3 mb-2 fw-bold fs-3">Apellido:</label>
                        <input 
                            type="text" 
                            name="apellido" 
                            id="apellido"
                            class="form-control mb-2 @error('apellido') is-invalid @enderror" 
                            value="{{ old('apellido', Auth::user()->apellido) }}"
                            @error('apellido') aria-describedby="error-apellido" @enderror
                        > 
                        @error('apellido')
                            <div class="bg-danger text-white mb-3 p-1" id="error-apellido">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex flex-column mb-3">
                        <label for="email" class="mt-3 mb-2 fw-bold fs-3">Correo electrónico:</label>
                        <input 
                            type="text" 
                            name="email" 
                            id="email" 
                            class="form-control mb-2 @error('email') is-invalid @enderror" 
                            value="{{ old('email', Auth::user()->email) }}"
                            @error('email') aria-describedby="error-email" @enderror
                        > 
                        @error('email')
                            <div class="bg-danger text-white mb-3 p-1" id="error-email">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <label for="numero" class="mt-3 mb-2 fw-bold fs-3">Número telefónico:</label>
                        <input 
                            type="text" 
                            name="numero" 
                            id="numero" 
                            class="form-control mb-2 @error('numero') is-invalid @enderror" 
                            value="{{ old('numero') }}"
                            @error('numero') aria-describedby="error-numero" @enderror
                        > 
                        @error('numero')
                            <div class="bg-danger text-white mb-3 p-1" id="error-numero">{{$message}}</div>
                        @enderror
                        <p class="aclaracionBlanco" id="aclaracion-numero">El número debe tener al menos 8 caracteres</p>
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <label for="link" class="mt-3 mb-2 fw-bold fs-3">URL de su sitio web que desea que revisemos:</label>
                        <input 
                            type="text" 
                            name="link" 
                            id="link" 
                            class="form-control mb-2 @error('link') is-invalid @enderror" 
                            value="{{ old('link') }}"
                            @error('link') aria-describedby="error-link" @enderror
                        > 
                        @error('link')
                            <div class="bg-danger text-white mb-3 p-1" id="error-link">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <label for="total" class="mt-3 mb-2 fw-bold fs-3">Servicio a contratar:</label>
                        <select type="text" name="total" id="total" class="form-control">
                            <option 
                            value="{{$servicio->precio}}"
                            @selected($servicio->servicio_id == $servicio_id)
                            >{{$servicio->nombre}} - ${{$servicio->precio}}</option>
                        </select>
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <label for="mensaje" class="mt-3 mb-2 fw-bold fs-3">Escriba en detalle acerca de su empresa y qúe busca mejorar:</label>
                        <textarea 
                            name="mensaje" 
                            id="mensaje" 
                            cols="30" rows="10" 
                            class="form-control mb-2 @error('mensaje') is-invalid @enderror" 
                            @error('mensaje') aria-describedby="error-mensaje" @enderror
                        > {{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <div class="bg-danger text-white mb-3 p-1" id="error-mensaje">{{$message}}</div>
                        @enderror
                        <p class="aclaracionBlanco" id="aclaracion-mensaje">El mensaje debe tener al menos 50 caracteres</p>
                    </div>

                    <input 
                        id="usuario_id" 
                        name="usuario_id" 
                        type="hidden"
                        value="{{Auth::user()->usuario_id}}">

                    <input 
                        id="servicio_id" 
                        name="servicio_id" 
                        type="hidden"
                        value={{$servicio_id}}>

                    <input 
                        id="fecha" 
                        name="fecha" 
                        type="hidden" 
                        value="{{date("Y-m-d")}}">

                    <input 
                        id="estado" 
                        name="estado" 
                        type="hidden" 
                        value="1">


                    <button type="submit" name="enviar" id="enviar" class="w-50 mx-auto my-3 fs-5 text-center text-white botonVioleta">Enviar</button>
                </form>
            @endif
        @endforeach
    </div>
</section>
@endsection