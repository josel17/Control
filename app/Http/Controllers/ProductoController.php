<?php

namespace App\Http\Controllers;

use App\Ume;
use App\Estado;
use App\Producto;
use App\Proveedor;
use App\Categoria;
use App\Laboratorio;
use App\Presentacion;
use App\ReglaImpuesto;
use App\MaestraDetalle;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductoRequest;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Producto::with(['proveedor','categoria','imagenes','estado','laboratorio'])->paginate(1000);

        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto;
        $this->authorize('create',$producto);
        $codigo = Producto::get()->last();
        if(is_null($codigo))
        {
            $codigo = 1000;
        }
        else
        {
            $codigo = $codigo->codigo +1;
        }
        //$prod = Producto::where('codigo', $codigo -1)->with(['proveedor','categoria','estado','impuesto','ume','presentacion'])->get();
        $proveedores = Proveedor::get();
        $laboratorios = Laboratorio::get();
        $presentacion = Presentacion::all();
        $categoria = Categoria::get();
        $estado = Estado::get();
        $impuesto = ReglaImpuesto::all();
        $ume = Ume::all();

        return view('productos.form',[
            'titulo' => 'Registrar nuevo producto',
            'producto' => new Producto,
            'proveedores' => $proveedores,
            'laboratorios' => $laboratorios,
            'categorias' => $categoria,
            'estados' => $estado,
            'impuestos' => $impuesto,
            'codigo' => $codigo,
            'umes' => $ume,
            'presentaciones' => $presentacion,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductoRequest $request, Producto $producto)
    {
        try
        {
            $this->authorize('create',$producto);
            Producto::create($request->validated());
            return back()->with('success','Producto creado exitosamente',[

            ]);
        } catch(Exception $ex)
        {
            return back()->with('error','Error al crear el producto'.$ex->message());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        try
        {
            $this->authorize('view',$producto);
            $proveedores = Proveedor::get();
            $laboratorios = laboratorio::get();
            $categoria = Categoria::get();
            $ume = Ume::all();
            $estado = Estado::get();
            $presentacion = Presentacion::all();
            $impuesto = ReglaImpuesto::all();

            return view('productos.form',[
                'titulo' => 'Actualizacion de datos producto '.$producto->nombre,
                'producto' => $producto,
                'proveedores' => $proveedores,
                'laboratorios' => $laboratorios,
                'categorias' => $categoria,
                'umes' => $ume,
                'estados' => $estado,
                'presentaciones' => $presentacion,
                'impuestos' => $impuesto,
            ]);
        }
        catch(Exception $ex)
        {
            return back()->with('info',$ex->message());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProductoRequest $request, Producto $producto)
    {

        try
        {
            $this->authorize('update',$producto);
            $producto->update($request->validated());
            return back()->with('success','Producto actualizado con exito');

        }catch(Exception $ex)
        {
            return back()->with('info',$ex->message());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        try
        {
            $this->authorize('delete',$producto);
            $producto->delete();
            return redirect(route('almacen.producto.index'))->with('success','Producto eliminado con exito');

        }catch(Exception $ex)
        {
            return back()->with('error','Ha ocurrido un error', $ex->message());
        }
    }

    public function view(Producto $producto)
    {
        $this->authorize('view', $producto);
        return view('productos.view',[
            'producto' => $producto,
        ]);
    }
}
