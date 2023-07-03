<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $rolUsuario = Auth::user()->rol;

        if($rolUsuario != 1) {
            return redirect()
                ->route(route:'inicio')
                ->with('status.message', 'Es necesario ser administrador para ingresar a esa pantalla')
                ->with('status.type', 'danger');
        }

        return $next($request);
    }
}
