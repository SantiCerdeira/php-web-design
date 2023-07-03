<?php
/** @var \MercadoPago\Preference  $preference*/
/** @var string  $publicKey*/
/** @var int  $servicio_id*/
session_start();
$_SESSION['servicio_id'] = $servicio_id;
?>

@extends('layouts/main')

@section('title', 'Confirmar compra')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('{{ $publicKey }}', {
          locale: 'es-AR'
        });
      
        mp.checkout({
          preference: {
            id: '{{ $preference->id }}'
          },
          render: {
            container: '#container-mp',
          }
        });
    </script>
@endpush

@section('main')
<section class="container seccionesLargoMinimo bg-white p-5 rounded">
    <h1 class="fs-1 text-center mt-3">Confirmar compra</h1>
    <article>
      <table class="table table-hover table-bordered my-3">
        <thead>
            <tr>
                <th>Servicio contratado</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>    
        </thead>
        <tbody>
          @foreach ($preference->items as $item)
            <tr> 
                <td>{{ $item->title }}</td>
                <td>{{date("Y-m-d")}}</td>
                <td>${{ $item->unit_price * $item->quantity }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </article>   

    <div class="d-flex justify-content-center fs-5" id="container-mp">

    </div>
</section>
@endsection