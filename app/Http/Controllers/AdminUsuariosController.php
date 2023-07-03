<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminUsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('admin.adminUsuarios', [
            'usuarios' => $usuarios,
        ]);
    }

    public function compras(int $id)
    {
        $compras = Compra::where('usuario_id', $id)->get();

        $usuario = Usuario::findOrFail($id);

        return view('admin.adminComprasUsuario', [
            'compras' => $compras,
            'usuario' => $usuario,
            'id' => $id,
        ]);
    }
}
