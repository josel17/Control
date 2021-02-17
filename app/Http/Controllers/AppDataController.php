<?php

namespace App\Http\Controllers;

use App\DatosEmpresa;
use App\Http\Requests\DatosEmpresaRequest;
use Illuminate\Http\Request;

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
                $datos = DatosEmpresa::get()->first();
                if(is_null($datos))
                {
                    $datos = new DatosEmpresa;
                }

                    return view('app/index',
                        [
                            'titulo' => 'Datos de la empresa',
                            'datos' => $datos,
                        ]);

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
          $data = DatosEmpresa::create($request->validated());
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
    public function update(DatosEmpresa $datosempresa, DatosEmpresaRequest $request)
    {
        try
        {

            $this->authorize('update',$datosempresa);
            $datosempresa->update($request->validated());
            return back()->with('success','Datos actualizados correctamente');
        } catch (Exception $e) {
            return back()->with('error','Se ha presentado un error al actualizar los datos');
        }
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
