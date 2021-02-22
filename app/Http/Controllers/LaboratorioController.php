/** Controller for model laboratorio 


<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaboratorioRequest;
use App\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Función para llamar la vista laboratorio 
     *
     * @return Vista laboratorio con el Objeto Laboratorio 
     */
    public function index()
    {
        $laboratorios = Laboratorio::all();
        return view('productos.laboratorio.index',
        [
            'titulo' => 'Lista de laboratorios registrados',
            'laboratorios' => $laboratorios,
        ]);
    }

    /**
     * Función para mostrar la vista laboratorio.form en la cual contiene el formulario para crear un laboratorio. 
     *
     * @return Vista laboratorio.form 
     */
    public function create()
    {
        $laboratorio = New Laboratorio;
        $this->authorize('create',$laboratorio);
        return view('productos.laboratorio.form',
            [
                'titulo' => 'Registrar nuevo laboratorio',
                'laboratorio' => $laboratorio,
            ]);
    }

    /**
     * Función para guardar los datos enviados desde el formulario laboratorio. 
     *
     * @param LaboratorioRequest $request
     * @param Laboratorio $laboratorio
     * 
     * @return respuesta del servidor según el estado de la transacción 
     */
    public function store(LaboratorioRequest $request, laboratorio $laboratorio)
    {
        try
        {
            $this->authorize('create', $laboratorio);
            Laboratorio::create($request->validated());
            return back()->with('success','Laboratorio guardado correctamente');

        } catch (Exception $e) {
            return back()->with('error','Error al guardar la informacion '.'error: '.$e->message());

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
     * Llamar la vista laboratorio.form para editar los datos del laboratorio.
     *
     * @param  Laboratorio $laboratorio
     * @return regresa la vista form con el Objeto Laboratorio
     */
    public function edit(Laboratorio $laboratorio)
    {
        $this->authorize('update',$laboratorio);
        return view('productos.laboratorio.form',[
            'titulo' => 'Actualizar datos del laboratorio '. $laboratorio->nombre,
            'laboratorio' => $laboratorio,
        ]);
    }

    /**
     * Función update que actualizará los datos del laboratorio. 
     *
     * @param LaboratorioRequest $request 
     * @param Laboratorio $laboratorio
     * @return respuesta del servidor según estado de la transacción
     */
    public function update(LaboratorioRequest $request, Laboratorio $laboratorio)
    {
        try
        {
            $laboratorio->update($request->validated());
            return back()->with('success','Datos actualizados correctamente');
        } catch (Exception $e) {
            return back()->with('error','Error al actualizar la informacion, '.'Error: '.$e->message());
        }
    }

    /**
     * Función que eliminará el laboratorio seleccionado.
     *
     * @param  Laboratorio $laboratorio. 
     * @return respuesta del servidor según el estado de la transacción 
     */
    public function destroy(Laboratorio $laboratorio)
    {
        try
        {
            $this->authorize('delete',$laboratorio);
            $laboratorio->delete();
            return back()->with('success','Laboratorio eliminado correctamente');
        } catch (Exception $e) {
            return back()->with('error','Error al eliminar el laboratorio '.' Error: '.$e->message());
        }
    }
}
