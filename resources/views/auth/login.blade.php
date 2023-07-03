<?php
/**@var  \Illuminate\Support\ViewErrorBag  $errors*/
?>

@extends('layouts/main')

@section('title','Iniciar sesión')

@section('main')
<section class="seccionesLargoMinimo container my-3 mx-auto">
    <h1 class="text-center text-white my-2">Iniciar sesión</h1>

    <div class="w-100">
        <form action="{{ route('auth.login') }}" method="post" class="d-flex flex-column p-2 my-3 w-75 mx-auto formulario">
            @csrf
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

            <button type="submit" class="w-50 mx-auto my-3 fs-5 text-center text-white botonVioleta">Ingresar</button>
        </form>
    </div>
</section>
@endsection