<?php
/**@var  \Illuminate\Support\ViewErrorBag  $errors*/
?>

@extends('layouts/main')

@section('title','Registrarse')

@section('main')
<section class="seccionesLargoMinimo container my-3 mx-auto">
    <h1 class="text-center text-white my-2">Registrarse en WebExpert</h1>

    <div class="w-100">
        <form action="{{ route('auth.registro') }}" method="post" class="d-flex flex-column p-2 my-3 w-75 mx-auto formulario">
            @csrf
            <div class="d-flex flex-column mb-3">
                <label for="nombre" class="mt-3 mb-2 fw-bold fs-3">Nombre:</label>
                <input 
                    type="text" 
                    name="nombre" 
                    id="nombre" 
                    class="form-control @error('nombre') is-invalid @enderror"
                    value="{{ old('nombre', '') }}"
                    @error('nombre') aria-describedby="nombre-error" @enderror
                    >
            </div>
            @error('nombre')
                <div class="mb-3 text-white bg-danger p-2 rounded"><span class="visually-hidden">Error:</span>{{$message}}</div>
            @enderror

            <div class="d-flex flex-column mb-3">
                <label for="apellido" class="mt-3 mb-2 fw-bold fs-3">Apellido:</label>
                <input 
                    type="text" 
                    name="apellido" 
                    id="apellido" 
                    class="form-control @error('apellido') is-invalid @enderror"
                    value="{{ old('apellido', '') }}"
                    @error('apellido') aria-describedby="apellido-error" @enderror
                    >
            </div>
            @error('apellido')
                <div class="mb-3 text-white bg-danger p-2 rounded"><span class="visually-hidden">Error:</span>{{$message}}</div>
            @enderror

            <div class="d-flex flex-column mb-3">
                <label for="email" class="mt-3 mb-2 fw-bold fs-3">Email:</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', '') }}"
                    @error('email') aria-describedby="email-error" @enderror
                    >
            </div>
            @error('email')
                <div class="mb-3 text-white bg-danger p-2 rounded"><span class="visually-hidden">Error:</span>{{$message}}</div>
            @enderror

            <div class="d-flex flex-column mb-3">
                <label for="password" class="mt-3 mb-2 fw-bold fs-3">Contraseña:</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control @error('password') is-invalid @enderror"
                    >
            </div>
            @error('password')
                <div class="mb-3 text-white bg-danger p-2 rounded"><span class="visually-hidden">Error:</span>{{$message}}</div>
            @enderror
            <p class="aclaracionBlanco" id="aclaracion-mensaje">La contraseña debe tener al menos 8 caracteres</p>

            <div class="d-flex flex-column mb-3">
                <label for="password_confirmation" class="mt-3 mb-2 fw-bold fs-3">Confirmar contraseña:</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    >
            </div>
            @error('password_confirmation')
                <div class="mb-3 text-white bg-danger p-2 rounded"><span class="visually-hidden">Error:</span>{{$message}}</div>
            @enderror

            <input 
                id="rol" 
                name="rol" 
                type="hidden" 
                value="2">

            <button type="submit" class="w-50 mx-auto my-3 fs-5 text-center text-white botonVioleta">Registrarme</button>
        </form>
    </div>
</section>
@endsection