
/**Controlador AppDataControlleren controla las funciones de la vista Datos de la aplicacion control.**/


<?php

namespace App\Http\Controllers;

use App\DatosEmpresa;
use App\Http\Requests\DatosEmpresaRequest;
use Illuminate\Http\Request;

class AppDataController extends Controller
{
  

    /**
     *Description: Funcion para llamar la view de datos de la App
     *@Param:Sin parametroa
     * @return: View la cual lleva los datosnde la empresa 
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
     * 
     *@Param
     * @return 
     */
    public function create()
    {

    }

    /**
     * Funcion que permite grabar los datos de la empresa en el modelo DatosEmpresa
     *
     * @param Request de tipo Illuminate/Http/Request/DatosEmpresaRequest
     * @Param datosempresa Modelonde la tabla datos_empresa
     * @return Mensaje de estadonde la transaccion. 
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
       * Description: Funcion para actualizar los datos de la tabla datos_empresa utiñizando el modelo DatosEmpresa 
       * 
       *@Param: @datosempresa: Modelo DatosEmpresa
       *@param: @request formRequest el cual validara los datos enviados desde el formulario en la vista
       * 
       * @return: Respuesta del estado de la transaccion
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
