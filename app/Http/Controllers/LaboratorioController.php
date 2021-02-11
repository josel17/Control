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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
