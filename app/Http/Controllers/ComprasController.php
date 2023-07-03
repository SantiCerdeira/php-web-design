<?php

namespace App\Http\Controllers;

use App\Mail\ServicioReservado;
use App\Models\Compra;
use App\Models\Servicio;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    public function index(int $id)
    {
        return view('compras', [
            'compras' => Compra::get(),
            'id' => $id,
        ]);
    }

    public function compraPorId(int $id)
    {
        $compra = Compra::findOrFail($id);

        return view('comprasCancelar', [
            'compra' => $compra,
        ]);
    }

    public function crearCompra(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Compra::VALIDATE_RULES,Compra::VALIDATE_MESSAGES);

        try {
            DB::transaction(function() use($data) {
                $compra = Compra::create($data);
            });

            $servicio = Servicio::findOrFail( $data['servicio_id']);

            Mail::to(Auth::user())
                ->send(new ServicioReservado($servicio, $request->user()));

            session_start();
            unset($_SESSION['servicio_id']); 

            return redirect()
                ->route('compras', ['id' => $data['usuario_id']])
                ->with('status.message', 'Felicitaciones por su compra. Lo estaremos contactando a la brevedad.')
                ->with('status.type', 'success');
        } catch (\Throwable $e) {
            Debugbar::error($e);

            return redirect()
                ->route('contratarForm', ['id' => $data['servicio_id']])
                ->withInput()
                ->with('status.message', 'Ocurrió un error al procesar su compra. Por favor intente nuevamente')
                ->with('status.type', 'danger');
        }
    }

    public function cancelarCompra(int $id,int $compra_id)
    {
        try {
            $compra = Compra::findOrFail($compra_id);

            $compra->delete();

            return redirect()
                ->route('compras', ['id' => $id])
                ->with('status.message', 'Compra cancelada exitosamente.')
                ->with('status.type', 'success');

        } catch (\Throwable $e) {
            Debugbar::error($e);

            return redirect()
                ->route('comprasCancelar', ['id' => $compra_id])
                ->with('status.message', 'Ocurrió un error al intentar eliminar su compra. Por favor intente nuevamente')
                ->with('status.type', 'danger');
        }
    }
}
