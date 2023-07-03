<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ContratarController extends Controller
{
    public function index()
   {
       return view('contratar', [
            'servicios' => Servicio::get(),
       ]);
   }

    public function contratarForm(Request $request)
   {
        $servicio_id = $request->servicio_id;
        
        return view('contratarForm', [
            'servicios' => Servicio::get(),
            'servicio_id' => $servicio_id
        ]);
   }
}
