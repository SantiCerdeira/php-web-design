<?php
/** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Compra[] $compras */
/** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Compra $ultimaCompra */
/** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Usuario $ultimoComprador */
/** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Servicio $ultimoServicio */
$totalServicios = 0;
$totalAsesoriasBasicas = 0;
$totalAsesoriasVivo = 0;
$finalizadas = 0;
$pendientes = 0;
foreach($compras as $compra){
    $totalServicios += 1;

    if($compra->servicio_id == 1) {
        $totalAsesoriasBasicas += 1;
    } else {
        $totalAsesoriasVivo += 1;
    }

    if($compra->estado == 1) {
        $pendientes += 1;
    } else {
        $finalizadas += 1;
    }
}
?>

@extends('layouts/admin')

@section('title', 'Panel de administración')

@section('main')
<section class="p-5">
    <h1 class="fs-1 text-center">Tablero de administración</h1>
    <a href="<?=route('admin.articulos');?>" class="btn btn-dark rounded text-white p-3 w-100 my-4">Administrar los artículos</a>
    <a href="<?= route('admin.usuarios');?>" class="btn btn-dark rounded text-white p-3 w-100 my-4">Administrar usuarios</a>
</section>
<section class="statsContainer">
    <h2 class="fs-2 text-center text-white mb-5">Estadísticas de las compras</h2>
    <div class="d-flex justify-content-around row my-3">
        <div class="stats col-11 col-md-5 col-xl-3 mx-1 my-2">
            <h3 class="fs-5 text-center">Cantidad de compras</h3>
            <p class="my-1 bg-dark text-white rounded p-2">Asesorías básicas: <b>{{$totalAsesoriasBasicas}}</b></p>
            <p class="my-1 bg-dark text-white rounded p-2">Asesorías en vivo: <b>{{$totalAsesoriasVivo}}</b></p>
            <p class="text-center fs-5 my-1"><b>Total: {{$totalServicios}}</b></p>
        </div>
        <div class="stats col-11 col-md-5 col-xl-3 mx-1 my-2">
            <h3 class="fs-5 text-center">Estado de las entregas</h3>
            <p class="my-1 p-2 text-white pendiente">Pendientes: <b>{{$pendientes}}</b></p>
            <p class="my-1 p-2 text-white finalizada">Finalizadas: <b>{{$finalizadas}}</b></p>
        </div>
        <div class="stats col-11 col-md-5 col-xl-3 mx-1 my-2">
            <h3 class="fs-5 text-center">Última compra realizada</h3>
            <div class="my-1 bg-dark text-white rounded p-2">
                <h4 class="fs-5 text-center">{{$ultimoServicio->nombre}}</h4>
                <ul class="list-unstyled mx-4">
                    <li>{{$ultimoComprador->nombre}} {{$ultimoComprador->apellido}}</li>
                    <li>${{$ultimaCompra->total}}</li>
                    <li>{{$ultimaCompra->fecha}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection