<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Usuario;
use DB;
use Debugbar;
use Illuminate\Http\Request;

class AdminArticulosController extends Controller
{

    public function index(Request $request,string $titulo = null)
    {

        $builder = Articulo::with(['usuario', 'categoria']);
        
        $paramsBuscar = [
            'titulo' => $request->query('titulo') ?? null,
        ];

        $titulo = $request->query('titulo') ?? null;

        if($paramsBuscar['titulo']) {
            $builder->where('titulo', 'LIKE', '%' . $paramsBuscar['titulo'] . '%');
        }
        
        //Uso ->appends($request->all()) en lugar de ->withQueryString() ya que me daba un error 
        // Y por lo que pude averiguar si bien en mi caso funcionaba igualmente en la web, usar 
        // ->withQueryString sobre ->paginate() hacía saltar un error en el editor de código.
        $articulos = $builder->paginate(2)->appends($request->all());

        return view('admin.adminArticulos', [
            'articulos'=> $articulos,
            'paramsBuscar' => $paramsBuscar,
            'titulo' => $titulo
        ]);
    }

    public function papelera(Request $request,string $titulo = null)
    {
        $builder = Articulo::onlyTrashed()->with(['usuario', 'categoria']);

        $paramsBuscar = [
            'titulo' => $request->query('titulo') ?? null,
        ];

        $titulo = $request->query('titulo') ?? null;

        if($paramsBuscar['titulo']) {
            $builder->where('titulo', 'LIKE', '%' . $paramsBuscar['titulo'] . '%');
        }

        $articulos = $builder->paginate(2)->appends($request->all());

        return view('admin.papelera', [
            'articulos'=> $articulos,
            'paramsBuscar' => $paramsBuscar,
            'titulo' => $titulo
        ]);
    }

    public function detalle(int $id)
    {
        $articulo = Articulo::findOrFail($id);
        
        return view('admin.adminDetalle', [
            'articulo' => $articulo
        ]);
    }
    
    public function nuevoForm()
    {
        return view('admin.adminNuevo', [
            'categorias' => Categoria::orderBy('nombre')->get(),
        ]);
    }

    public function nuevoCrear(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Articulo::VALIDATE_RULES,Articulo::VALIDATE_MESSAGES);

        if($request->hasFile(key:'portada')) {
            $portada = $request->file(key:'portada');
            $data['portada'] = date(format: 'YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $portada->extension();
            $portada->move(public_path(path:'img'), $data['portada']);
        }

        try {
            DB::transaction(function() use( $data) {
                $articulo = Articulo::create($data);
            });

            return redirect()
                ->route(route:'admin.articulos')
                ->with('status.message', 'El artículo </b>' . e( $data['titulo']) . '</b> fue creado con éxito.')
                ->with('status.type', 'success');

        } catch (\Throwable $e) {
            Debugbar::error($e);

            return redirect()
                ->route(route:'admin.articulos.nuevoForm')
                ->with('status.message', 'Ocurrió un error. El artículo </b>' . e( $data['titulo']) . '</b> no pudo ser creado.')
                ->with('status.type', 'danger');
        }
    }

    public function editarForm(int $id)
    {
        $articulo = Articulo::findOrFail($id);

        return view('admin.adminEditar', [
            'articulo' => $articulo,
            'usuarios' => Usuario::orderBy('nombre')->get(),
            'categorias' => Categoria::orderBy('nombre')->get(),
        ]);
    }

    public function editar(Request $request, int $id)
    {
        $data = $request->except(['_token']);

        $request->validate(Articulo::VALIDATE_RULES,Articulo::VALIDATE_MESSAGES);

        $articulo = Articulo::findOrFail($id);

        if($request->hasFile(key:'portada')) {
            $portada = $request->file(key:'portada');
            $data['portada'] = date(format: 'YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $portada->extension();
            $portada->move(public_path(path:'img'), $data['portada']);
            $portadaAnterior = $articulo->portada;
        } else {
            $portadaAnterior = null;
        }

        try {
            DB::transaction(function() use($articulo, $data) {
                $articulo->update($data);
            });

            if($portadaAnterior != null && file_exists(public_path(path: 'img/' . $portadaAnterior))) {
                unlink(public_path(path:'img/' . $portadaAnterior));
            }

            return redirect()
                ->route(route:'admin.articulos')
                ->with('status.message', 'El artículo: <b>' . e( $articulo->titulo) . '</b> fue editado con éxito.')
                ->with('status.type', 'success');
        } catch (\Throwable $e) {
            Debugbar::error($e);

            return redirect()
                ->route('admin.articulos.editarForm', ['id' => $articulo->articulo_id])
                ->with('status.message', 'Ocurrió un error. El artículo: <b>' . e( $articulo->titulo) . '</b> no pudo ser editado.')
                ->with('status.type', 'danger')
                ->withInput();
        }
    }

    public function eliminarConfirmar(int $id)
    {
        $articulo = Articulo::findOrFail($id);
        
        return view('admin.adminEliminarConfirmar', [
            'articulo' => $articulo
        ]);
    }

    public function eliminar(int $id)
    {
        $articulo = Articulo::findOrFail($id);

        $articulo->delete();

        return redirect()
            ->route(route:'admin.articulos')
            ->with('status.message', 'La <b>' . e( $articulo->titulo) . '</b> fue eliminada con éxito.')
            ->with('status.type', 'success');
    }

    public function eliminarDefinitivamenteConfirmar(int $id)
    {
        $articulo = Articulo::onlyTrashed()->findOrFail($id);

        return view('admin.adminEliminarDefinitivamenteConfirmar', [
            'articulo' => $articulo
        ]);
    }

    public function eliminarDefinitivamente(int $id)
    {
        $articulo = Articulo::onlyTrashed()->findOrFail($id);
        
        try {
            DB::transaction(function() use($articulo) {
                $portadaAnterior = $articulo->portada;

                if($portadaAnterior != null && file_exists(public_path(path: 'img/' . $portadaAnterior))) {
                    unlink(public_path(path:'img/' . $portadaAnterior));
                }

                $articulo->forceDelete();
            });
    
            return redirect()
                ->route(route:'admin.articulos.papelera')
                ->with('status.message', 'El artículo fue eliminado exitosamente.')
                ->with('status.type', 'success');
        } catch (\Throwable $e) {
            Debugbar::error($e);
    
            return redirect()
                ->route(route:'admin.articulos.papelera')
                ->with('status.message', 'Ocurrió un error. El artículo no pude ser eliminado.')
                ->with('status.type', 'danger');
        }
    }

    public function recuperar(int $id)
    {
        Articulo::onlyTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route(route:'admin.articulos.papelera')
            ->with('status.message', 'El artículo fue recuperado exitosamente.')
            ->with('status.type', 'success');
    }
}
