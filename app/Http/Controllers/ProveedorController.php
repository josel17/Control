<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProveedorRequest;

class ProveedorController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Metodo para llamar la vista principal 
     *
     * @return Vista
     */
    public function index()
    {

        $proveedor = Proveedor::get()->all();
        return view('productos.proveedor.index',
            [
            'proveedor' => $proveedor,
            'title' => 'Lista de proveedores',
            ]);
    }

    /**
     * Carga la vista que contiene el formulario para crear un nuevo proveedor. 
     *
     * @return Vista proveedor.create
     */
    public function create()
    {
        $proveedor = new Proveedor;

        $this->authorize('create',$proveedor);

        return view('productos.proveedor.create',[
            'proveedor' => $proveedor,
            'title' => 'Crear Proveedor',
        ]);
    }

    /**
     * Metodo para registrar la información del nuevo proveedor
     *
     * @param SaveProveedorRequest $request
     * @return respuesta del servidor según el estado de la transacción. 
     */
    public function store(SaveProveedorRequest $request, Proveedor $proveedor)
    {
        try {

                $this->authorize('create',$proveedor);
            if (isset($request->tipo_proveedor))
            {
            }
            else
            {
                $request->tipo_proveedor =0;
            }

            Proveedor::create($request->validated());
            return back()->with('success','Proveedor registrado exitosamente');
        }
        catch (Exception $ex)
        {
            return back()->whit('error','Se ha presentado el siguiente error'.$ex->message());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * llama la vista que contiene el formulario para editar el proveedor.
     *
     * @param Proveedor $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        try
        {
            return view('productos/proveedor/create',[
                'proveedor' => $proveedor,
                'title' => 'Actualizar datos de '.$proveedor->nombre,
            ]);

        } catch (Exception $e) {

        }
    }

    /**
     * Metodo para actualizar la información del proveedor enviada desde la vista
     *
     * @param  SaveProveedorRequest $request 
     * @param  Proveedor $proveedor
     * @return Respuesta del servidor según el estado de la transacción. 
     */
    public function update(SaveProveedorRequest $request, Proveedor $proveedor)
    {
        try
        {
            $this->authorize('update',$proveedor);
            $proveedor->update($request->validated());
            return back()->with('success','Proveedor actualizado con exito');
        } catch (Exception $ex) {

            return back()->with('error','Se ha presentado el siguiente error '.$ex->message());
        }
    }

    /**
     * Eliminar la información del proveedor.
     *
     * @param Proveedor $proveedor. 
     * @return Respuesta del servidor según el estado de la transacción. 
     */
    public function destroy(Proveedor $proveedor)
    {
        try
        {
            $this->authorize('delete',$proveedor);
            $proveedor->delete();
            return back()->with('success','El proveedor se ha eliminado con exito');
        }
        catch (Exception $ex) {
            return back()->with('error','Se ha presentado el siguiente error'.$ex->message());
        }
    }
}
