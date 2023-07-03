<?php
/**@var  \App\Models\Compra[]  $compras*/
/**@var  \App\Models\Usuario  $usuario*/
/**@var  int $id*/
$totalCompras = 0;
foreach($compras as $compra){
    if($compra->usuario_id == $id) {
        $totalCompras += 1;
    }
}
?>

@extends('layouts/admin')

@section('title', 'Compras de ' . $usuario->nombre . ' ' . $usuario->apellido)

@section('main')
<section class="container my-3">
    <h1>Compras de {{$usuario->nombre}} {{$usuario->apellido}}</h1>
    <a href="{{ route('admin.usuarios') }}" class="btn btn-dark fs-4 fw-bold my-3 text-decoration-none text-white">Volver al listado de usuarios</a>

    <article>
        @if($totalCompras == 0)
            <h2 class="text-center fs-2 my-5">Este usuario no ha realizado ninguna compra.</h2>
        @else
            <table class="table table-hover table-bordered mb-2">
                <thead>
                    <tr>
                        <th>Id de la compra</th>
                        <th>Servicio contratado</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>    
                </thead>
                <tbody>
                    @foreach($compras as $compra)
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
                            <td>
                                @if($compra->estado == 1)
                                    <p class="pendiente text-center mx-auto my-auto p-2 text-white">Pendiente</p>
                                @else
                                    <p class="finalizada text-center mx-auto my-auto p-2 text-white">Finalizada</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </article>
</section>
@endsection