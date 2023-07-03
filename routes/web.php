<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name(name:'inicio');

Route::get('/articulos', [App\Http\Controllers\ArticulosController::class, 'index'])
    ->name(name:'articulos');

Route::get('/articulos/{id}', [App\Http\Controllers\ArticulosController::class, 'detalle'])
    ->name(name:'articulos.detalle')
    ->whereNumber(parameters:'id');

Route::get('/contratar', [App\Http\Controllers\ContratarController::class, 'index'])
    ->name(name:'contratar');

Route::get('/contratar/formulario/{servicio_id}', [App\Http\Controllers\ContratarController::class, 'contratarForm'])
    ->name(name:'contratarForm')
    ->whereNumber(parameters:'servicio_id')
    ->middleware(['auth', 'cliente']);

Route::post('/contratar/formulario', [App\Http\Controllers\ComprasController::class, 'crearCompra'])
    ->name(name:'crearCompra');

Route::get('/compras/{id}', [App\Http\Controllers\ComprasController::class, 'index'])
    ->name(name:'compras')
    ->whereNumber(parameters:'id')
    ->middleware(['auth']);

Route::get('/compras/cancelar/{compra_id}', [App\Http\Controllers\ComprasController::class, 'compraPorId'])
    ->name(name:'comprasCancelar')
    ->whereNumber(parameters:'compra_id');

Route::post('/compras/cancelar/{id}/{compra_id}', [App\Http\Controllers\ComprasController::class, 'cancelarCompra'])
    ->name(name:'cancelarCompra')
    ->whereNumber(parameters:['id','compra_id']);

Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])
    ->name(name:'contacto');

// ---------- AUTENTICACION ----------

Route::get('iniciar-sesion', [App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name(name:'auth.loginForm');

Route::post('iniciar-sesion', [App\Http\Controllers\AuthController::class, 'login'])
    ->name(name:'auth.login');

Route::get('registrarse', [App\Http\Controllers\AuthController::class, 'registroForm'])
    ->name(name:'auth.registroForm');

Route::post('registrarse', [App\Http\Controllers\AuthController::class, 'registro'])
    ->name(name:'auth.registro');

Route::post('cerrar-sesion', [App\Http\Controllers\AuthController::class, 'logout'])
    ->name(name:'auth.logout');


// ---------- ADMIN ----------
Route::get('/admin', [App\Http\Controllers\AdminHomeController::class, 'index'])
    ->name(name:'admin.inicio')
    ->middleware(['auth', 'admin']);

Route::middleware(['auth', 'admin'])
    ->controller(\App\Http\Controllers\AdminArticulosController::class)
    ->group(function() {

    Route::get('/admin/articulos', 'index')
        ->name(name:'admin.articulos');

    Route::get('/admin/articulos/papelera', 'papelera')
        ->name(name:'admin.articulos.papelera');

    Route::get('/admin/articulos/{id}', 'detalle')
        ->name(name:'admin.articulos.detalle')
        ->whereNumber(parameters:'id');

    Route::get('/admin/articulos/{id}/editar', 'editarForm')
        ->name(name:'admin.articulos.editarForm')
        ->whereNumber(parameters:'id');

    Route::post('/admin/articulos/{id}/editar', 'editar')
        ->name(name:'admin.articulos.editar')
        ->whereNumber(parameters:'id');

    Route::get('/admin/articulos/{id}/eliminar', 'eliminarConfirmar')
        ->name(name:'admin.articulos.eliminarConfirmar')
        ->whereNumber(parameters:'id');

    Route::post('/admin/articulos/{id}/eliminar', 'eliminar')
        ->name(name:'admin.articulos.eliminar')
        ->whereNumber(parameters:'id');

    Route::get('/admin/articulos/{id}/eliminar-definitivamente', 'eliminarDefinitivamenteConfirmar')
        ->name(name:'admin.articulos.eliminarDefinitivamenteConfirmar')
        ->whereNumber(parameters:'id');

    Route::post('/admin/articulos/{id}/eliminar-definitivamente', 'eliminarDefinitivamente')
        ->name(name:'admin.articulos.eliminarDefinitivamente')
        ->whereNumber(parameters:'id');

    Route::post('/admin/articulos/{id}/recuperar', 'recuperar')
        ->name(name:'admin.articulos.recuperar')
        ->whereNumber(parameters:'id');

    Route::get('/admin/articulos/nueva', 'nuevoForm')
        ->name(name:'admin.articulos.nuevoForm');

    Route::post('/admin/articulos/nueva', 'nuevoCrear')
        ->name(name:'admin.articulos.nuevoCrear');

    Route::get('/admin/usuarios', [App\Http\Controllers\AdminUsuariosController::class, 'index'])
        ->name(name:'admin.usuarios');

    Route::get('/admin/usuarios/{id}', [App\Http\Controllers\AdminUsuariosController::class, 'compras'])
        ->name(name:'admin.usuarios.compras')
        ->whereNumber(parameters:'id');
});

// ---------- MERCADO PAGO ----------

Route::middleware(['auth', 'cliente'])
    ->group(function() {
    Route::get('/mp/confirmarcompra/{servicio_id}', [App\Http\Controllers\MercadoPagoController::class, 'confirmarCompra'])
        ->name(name:'mp.confirmar')
        ->whereNumber(parameters:'servicio_id');

    Route::get('/mp/success', [App\Http\Controllers\MercadoPagoController::class, 'success'])
        ->name(name:'mp.success');

    Route::get('/mp/failure', [App\Http\Controllers\MercadoPagoController::class, 'failure'])
        ->name(name:'mp.failure');

    Route::get('/mp/pending', [App\Http\Controllers\MercadoPagoController::class, 'pending'])
    ->name(name:'mp.pending');
});