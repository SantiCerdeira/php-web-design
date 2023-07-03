<?php
/** @var \Illuminate\Database\Elocuent\Collection | \App\Models\Usuario[] $usuarios */
?>

@extends('layouts/admin')

@section('title', 'Usuarios | Panel de administración')

@section('main')
<section class="container my-3">
    <h1>Listado de usuarios</h1>

    <article>
        <table class="table table-hover table-bordered my-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol de usuario</th>
                    <th>Compras</th>
                </tr>    
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->usuario_id }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @if($usuario->rol == 1)
                                Administrador
                            @elseif($usuario->rol == 2)
                                Cliente
                            @endif
                        </td>
                        <td>
                            @if($usuario->rol == 1)
                                <i>No hay compras</i>
                            @elseif($usuario->rol == 2)
                                <a href="{{ route('admin.usuarios.compras', ['id' => $usuario->usuario_id]) }}" class="btn btn-dark px-3 w-100">Ver compras</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
</section>
@endsection