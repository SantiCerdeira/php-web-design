<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use DB;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view(view: 'auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(Usuario::VALIDATE_RULES,Usuario::VALIDATE_MESSAGES);
        
        $credenciales = [
            'email' => $request->input(key: 'email'),
            'password' => $request->input(key: 'password'),
        ];

        if(Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if(Auth::user()->rol == 1) {
                return redirect()
                ->route(route: 'admin.inicio')
                ->with('status.message' , 'Sesión iniciada con éxito. ¡Bienvenido/a!')
                ->with('status.type' , 'success');
            } else {
                return redirect()
                ->route(route: 'inicio')
                ->with('status.message' , 'Sesión iniciada con éxito. ¡Bienvenido/a!')
                ->with('status.type' , 'success');
            }
        }

        return redirect()
            ->route(route: 'auth.loginForm')
            ->withInput()
            ->with('status.message' , 'Las credenciales no coinciden con ninguno de nuestros registros')
            ->with('status.type' , 'danger');
    }

    public function registroForm()
    {
        return view(view: 'auth.registro');
    }

    public function registro(Request $request)
    {
        $request->validate(Usuario::VALIDATE_REGISTRATION_RULES,Usuario::VALIDATE_REGISTRATION_MESSAGES);
        
        $credenciales = [
            'nombre' => $request->input(key: 'nombre'),
            'apellido' => $request->input(key: 'apellido'),
            'email' => $request->input(key: 'email'),
            'password' => \Hash::make(value: $request->input('password')),
            'rol' => $request->input(key: 'rol'),
        ];

        try {
            DB::transaction(function() use( $credenciales) {
                $usuario = Usuario::create($credenciales);
            });

            return redirect()
                ->route(route: 'auth.loginForm')
                ->with('status.message' , 'Te has registrado con éxito. Ahora puedes iniciar sesión')
                ->with('status.type' , 'success');
        } catch (\Throwable $e) {
            Debugbar::error($e);

            return redirect()
                ->route(route: 'auth.registroForm')
                ->withInput()
                ->with('status.message' , 'Ha ocurrido un error al registrarte')
                ->with('status.type' , 'danger');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route(route: 'inicio')
            ->with('status.message' , 'Sesión cerrada correctamente.')
            ->with('status.type' , 'success');
    }
}
