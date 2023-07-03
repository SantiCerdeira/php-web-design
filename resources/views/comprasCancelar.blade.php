<?php
/**@var  \App\Models\Compra  $compra*/
?>

@extends('layouts/main')

@section('title', 'Cancelar compra')

@section('main')

<section class="container seccionesLargoMinimo bg-white p-5 rounded">
    <h1 class="fs-1 mb-3">Cancelar compra {{$compra->compra_id}}</h1>
    <article>
        <table class="table table-hover table-bordered mb-2">
            <thead>
                <tr>
                    <th>Id de la compra</th>
                    <th>Servicio contratado</th>
                    <th>Fecha</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td>{{ $compra->compra_id }}</td>
                    <td>
                        @if($compra->servicio_id == 1)
                            Asesoría básica
                        @else
                            Asesoría en vivo
                        @endif
                    </td>
                    <td>{{ $compra->fecha }}</td>
                    <td>${{$compra->total}}</td> 
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <h2 class="text-center fs-3">¿Desea cancelar esta compra? Esta acción no se puede deshacer</h2>
            <div class="d-flex justify-content-around w-50 mx-auto py-3">
                <a href="{{route('compras', ['id' => Auth::user()->usuario_id])}}" class="btn btn-dark p-3 fs-5">Volver a mis compras</a>
                <form action="{{route('cancelarCompra', ['id' => Auth::user()->usuario_id, 'compra_id' => $compra->compra_id])}}" method="post">
                    @csrf
                    <button class="btn btn-danger p-3 fs-5">Cancelar compra</button>
                </form>
            </div>
        </div>
    </article>        
 </section>
@endsection