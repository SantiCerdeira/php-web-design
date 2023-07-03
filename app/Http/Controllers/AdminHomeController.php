<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $utlimaCompra = Compra::all()->last();

        $ultimoComprador = Usuario::findOrFail($utlimaCompra->usuario_id);

        $ultimoServicio = Servicio::findOrFail($utlimaCompra->servicio_id);

        return view('admin.adminHome', [
            'compras' => Compra::all(),
            'ultimaCompra' => $utlimaCompra,
            'ultimoComprador' => $ultimoComprador,
            'ultimoServicio' => $ultimoServicio,
        ]);
    }
}
