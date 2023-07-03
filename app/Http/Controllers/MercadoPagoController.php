<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Preference;

class MercadoPagoController extends Controller
{
    public function confirmarCompra(int $servicio_id)
    {
        SDK::setAccessToken(config('mercadopago.access_token'));

        $preference = new Preference;

        $items = [];

        $servicio = Servicio::findOrFail($servicio_id);

        $item = new Item();
        $item->title = $servicio->nombre;
        $item->unit_price = $servicio->precio;
        $item->quantity = 1;
        $items[] = $item;

        $preference->items = $items;

        $preference->back_urls = [
            'success' => route('mp.success'),
            'pending' => route('mp.pending'),
            'failure' => route('mp.failure'),
        ];

        $preference->save();

        return view('mercadopago', [
            'preference' => $preference,
            'publicKey' => config('mercadopago.public_key'),
            'servicio_id' => $servicio_id,
        ]); 
    }

    public function success()
    {
        session_start();
        $servicio_id = $_SESSION['servicio_id'];

        return redirect()
            ->route('contratarForm', ['servicio_id' => $servicio_id])
            ->with('status.message', 'Su compra se ha registrado correctamente. Ahora, rellene los siguientes datos.')
            ->with('status.type', 'success');
    }

    public function failure()
    {
        return redirect()
            ->route('contratar')
            ->with('status.message', 'Ha ocurrido un error al complear su compra.')
            ->with('status.type', 'danger');
    }

    public function pending()
    {
        return redirect()
            ->route('inicio')
            ->with('status.message', 'Su contratación se ha registrado. Por favor, aguarde mientras se procesa el pago.')
            ->with('status.type', 'success');
    }
}
