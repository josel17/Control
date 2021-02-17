<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\DatosEmpresaRequest;

class AppDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          try
            {
               return view('app/index');
            } catch (Exception $e) 
            {
              return back()->with('error','Se ha presentado un error al intentar abrir la pagina');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosEmpresaRequest $request, DatosEmpresa $datosempresa)
    {
        try 
        {
          $data = DatosEmpresa::create($request->validate());
          if ($data == true) {
            return back()->with('success','Datos registrados correctamente');
          }
          else {
            return back()->with('Se ha presentado un error al guardar la informacion');
          }
        } catch (Exception $e) {
          return back()->with('error','Se ha presentado un error al grabar la informacion',$e->message());
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
