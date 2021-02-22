/**Controller for Producto Model**/ 

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
     * Función para cargar la vista index con el formulario para crear productos. 
     *
     * @return retorna la vista productos.index con el objeto Productos
     */
    public function index()
    {

        $productos = Producto::with(['proveedor','categoria','imagenes','estado','laboratorio'])->paginate(1000);

        return view('productos.index',compact('productos'));
    }

    /**
     * carga la vista productos.form con una nueva instancia de Producto. 
     *
     * @return Vista productos.form con los objetos proveedores, laboratorios, presentacion, categoría, estado, impuesto, ume para crear un nuevo producto
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
     * Función para grabar los datos del nuevo producto enviados desde el formulario
     *
     * @param SaveProductoRequest $request
     * @param Producto $producto. 
     * @return respuesta del servidor según el estado de la transacción. 
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
     * Función para cargar la vista para visualizar la información de un producto
     *
     * @param Producto $producto.
     * @return Vista productos.form con el objeto Producto consultado, 
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
     * Función para actualizar datos en el modelo Producto
     *
     * @param SaveProductoRequest $request
     * @param Producto $producto
     * @return respuesta del servidor según estado de la transacción
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
     * se eliminará ellos datos del usuario seleccionado. 
     *
     * @param Producto $producto. 
     * @return respuesta del servidor según el estado de la transacción
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

 /**
     * Función para llamar la vista view en la que se mostrarán los datos del producto seleccionado. 
     *
     * @param Producto $producto. 
     * @return Llamdo a la vista con el objeto Producto. 
     */

    public function view(Producto $producto)
    {
        $this->authorize('view', $producto);
        return view('productos.view',[
            'producto' => $producto,
        ]);
    }
}
