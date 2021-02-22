/**
* Controlador CategoriasController para administrar el CRUD del modelo categorias.
*
**/

<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\SaveCategoriaRequest;

class CategoriasController extends Controller
{
    /**
     * Consular las categorias y enviarlas a la vista Categorias.index
     *
     * @return Object Categorias a la vista index
     */
    public function index()
    {
        $categorias = new Categoria;
        $categorias = Categoria::with('user')->paginate();
        return view('productos/categorias/index',[
            'categorias' => $categorias,
            'title' => 'Lista de categorias registradas'
            ]);
    }

    /**
     * Mostrar la vista categorias.form en la cual esta el formulario para registrar las categorias.
     *
     * @return Vista categorias.form
     */
    public function create()
    {
        $categorias = new Categoria;
        $this->authorize('create',$categorias);
        return view('productos/categorias/form',[
            'categoria' => $categorias,
            'title' => 'Crear nueva categoria',
        ]);
    }

    /**
     * Registrar en la tabla Categorias los datos que se envian desde el formulario.
     *
     * @param  Object $request
     * @Param. Object $Categoria
     * 
     * @return estado de la transaccion 
     */
    public function store(SaveCategoriaRequest $request, Categoria $categoria)
    {
        try
        {
            $this->authorize('create',$categoria);
            Categoria::create($request->validated());
            return back()->with('success','Categoria registrada con exito');
        }
         catch (Exception $ex)
        {
            return back()->with('error','Ha ocurrio un error al intentar grabar la categoria'.$ex->message());
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
     * Mostrar la vista que contiene el formulario para editar la categoria.
     *
     * @param  Object  $Categoria.
     * 
     * @return vista Categorias.form
     */
    public function edit(Categoria $categoria)
    {
        $this->authorize('update',$categoria);
         return view('productos/categorias/form',[
            'categoria' => $categoria,
            'title' => 'Actualizar datos de la categoria '.$categoria->nombre,
        ]);
    }

    /**
     * Actualizar datos de la categoria seleccionada.
     *
     * @param Object $request
     * @param Object $categoria
     * 
     * @return Respuesta del servidor segun el estado de la transaccion.
     */
    public function update(SaveCategoriaRequest $request, Categoria $categoria)
    {
        try {
            $this->authorize('update',$categoria);
            $categoria->update($request->validated());
            return back()->with('success','Datos actualizados correctamente');

        } catch (Exception $e) {
            return back()->with('error','Se ha presentado un error al actualizar los datos'.$e->message());
        }
    }

    /**
     * Eliminar la categoria de la base de datos
     *
     * @param  Object $categoria
     * @return Respuesta del servidor segun el estado de la transaccion 
     */
    public function destroy(Categoria $categoria)
    {
        try
        {
            $this->authorize('Delete',$categoria);
            $categoria->delete();
            return back()->with('success','Categoria eliminada con exito');
        } catch (Exception $ex) {
            return back()->with('error','Se ha presentado un error '.$ex->message());
        }
    }
}
