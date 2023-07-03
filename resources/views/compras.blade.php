<?php
/**@var  \App\Models\Compra[]  $compras*/
/**@var  int $id*/
$totalCompras = 0;
foreach($compras as $compra){
    if($compra->usuario_id == $id) {
        $totalCompras += 1;
    }
}
?>

@extends('layouts/main')

@section('title', 'Mis compras')

@section('main')

<section class="container seccionesLargoMinimo bg-white p-5 rounded">
    @if($id == Auth::user()->usuario_id)
        <h1 class="fs-1 mb-3">Mis compras ({{Auth::user()->nombre}} {{Auth::user()->apellido}}):</h1>
        <article>
            @if($totalCompras == 0)
                <h2 class="text-center fs-2 my-5">Aún no ha realizado ninguna compra.</h2>
                <div class="d-flex justify-content-center">
                    <a href="{{route('contratar')}}" class="my-3 fs-5 text-center text-white botonVioleta w-50">Contrata nuestros servicios</a>
                </div>
            @else
                <table class="table table-hover table-bordered mb-2">
                    <thead>
                        <tr>
                            <th>Id de la compra</th>
                            <th>Servicio contratado</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach($compras as $compra)
                            @if($compra->usuario_id == $id)
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
                                    <td>
                                        @if($compra->estado == 1)
                                            <a href="{{route('comprasCancelar', ['compra_id' => $compra->compra_id])}}" class="btn btn-danger p-2 w-100 mx-auto my-auto">Cancelar</a>
                                        @else
                                            <p class="text-center mx-auto my-auto fs-4">-</p>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </article> 
    @else
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="fs-1 mb-3 text-center my-auto">No puedes ver las compras de otros usuarios</h1>
        <a href="{{route('compras', ['id' => Auth::user()->usuario_id])}}" class="my-3 fs-5 text-center text-white botonVioleta w-50 my-3">Ver mis compras</a>
    </div>
    @endif
 </section>
    
@endsection