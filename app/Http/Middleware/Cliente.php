<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cliente
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

        if($rolUsuario == 1) {
            return redirect()
                ->route(route:'inicio')
                ->with('status.message', 'Las compras deben ser realizadas desde un usuario que no sea administrador')
                ->with('status.type', 'danger');
        }

        return $next($request);
    }
}
