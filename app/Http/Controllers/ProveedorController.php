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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
