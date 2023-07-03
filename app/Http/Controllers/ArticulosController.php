<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();

        return view('articulos', [
            'articulos'=> $articulos
        ]);
    }

    public function detalle(int $id)
    {
        $articulo = Articulo::findOrFail($id);

        return view('articulosDetalle', [
            'articulo' => $articulo,
        ]);
    }
}
