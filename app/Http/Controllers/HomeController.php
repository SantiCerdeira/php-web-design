<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articulos = Articulo::take(2)->get();

        return view('home', [
            'articulos'=> $articulos
        ]);
    }
}
