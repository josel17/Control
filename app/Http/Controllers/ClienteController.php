/**
* ClienteController administrar el CRUD del modelo Cliente.
**/

<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Http\Requests\ClienteRequest;
use App\Persona;
use Illuminate\Http\Request;


class ClienteController extends Controller
{

/**Cargar el middaleware para verificar la autenticacion**/
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Funcion para Cargar la vista cliente 
     *
     * @return vista Cliente.index con los Object Deptos, Clientes, 
     * 
     */
    public function index()
    {
        if(Auth()->user()->hasRole('Admin'))
        {
            $tipoform = 'cliente';
            $deptos = Departamento::get();
            $clientes = Persona::where('tipo',2)->with(['user'])->paginate(10);
            $titleModal = 'Crear nuevo Cliente';
            $title = 'Lista de clientes registrados';
            //$users = User::get();
            return view('cliente.index',compact('clientes','deptos','title','titleModal','tipoform'));
        }else
        {
            return back()->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Funcion store para guardar los datos del cliente que se reciben del formulario atraves de request
     *
     * @param  ClienteRequest $request.
     * @return Respuesta del servidor segun el estado de la transaccion.
     */
    public function store(ClienteRequest $request)
    {
        $request->tipo = 2;
        Persona::create($request->validated());
        return back()->with('success','Cliente registrado exitosamente');
    }

    /**
     * Funcion para mostrar los datos del cliente en la vista persona.show.
     *
     * @param  Persona $cliente
     * @return Regresa la vista show con el Object Cliente
     */
    public function show(Persona $cliente)
    {
        $this->authorize('view',$cliente);
        $deptos = Departamento::get();
        $ciudad = $this->lciudad($cliente->id_departamento);
        return view('persona.show',[
            'persona' => $cliente,
            'deptos' => $deptos,
            'ciudad' => $ciudad,
            ]);
    }


    /**
     * Funcion para cargar las ciudades una ves seleccionado el departamento en la vista Persona/Cliente
     *
     * @param  int $id
     * @return retorna a la vista por medio ajax el Obj Ciudad.
     */
     public function lciudad($id)
    {
        return Ciudad::where('id_departamento',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Funcion para actualizar los datos enviados desde el formulario en la tabla Personas
     *
     * @param ClienteRequest $request
     * @param  Persona  $persona
     * @return Respuesta del servidor segun el estado de la transaccion update
     */
    public function update(Persona $persona, ClienteRequest $request)
    {
        $persona->update($request->validated());
        return redirect()->route('persona.show', $persona)->with('success','Datos actualizados con éxito');
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
