<?php

namespace App\Http\Controllers;

use App\User;
use App\Ciudad;
use App\Persona;
use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SavePersonaRequest;



class PersonaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


/**Function for load the view persona.index with the Object Departamento and Persona
**/
	public function index()
	{
		if(Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View users'))
		{
			$deptos = Departamento::get();
			$personas = Persona::where('tipo',1)->with(['user'])->paginate(10);
            $titleModal = 'Crear nuevo usuario';
            $title = 'Lista de usuarios registrados';
            $tipoform  = 'persona';
			//$users = User::get();
			return view('persona.index',compact('personas','deptos','title','titleModal','tipoform'));
		}else
		{
			return back()->withInput('info','No se han encontrado registros en la base de datos');
		}
	}

/**
     * Función que guardará los datos del formulario persona en la tabla persona
     *
     * @param SavePersonaRequest $request
     * @return respuesta del servidor según el estado de la transacción
     */
	public function store(SavePersonaRequest $request)
	{
	  try {
	    $request->tipo = 1;
	    Persona::create($request->validated());
	    return back()->with('info','Registros guardados correctamente');
	  } catch (Exception $e)
	  {
	    return back()->with('error','Se ha presentado un error al guardar la información');
	  }
	}

/**Función para cargar los datos de la ciudad según el departamento seleccionado. **/


	 public function lciudad($id)
    {
    	return Ciudad::where('id_departamento',$id)->get();
    }

/**Función para llamar la vista show y cargar los datos de una persona
 * @param Persona $persona
 * @return Vista con los objetos Persona, Departamento y Ciudad
 **/
    public function show(Persona $persona)
    {
    	$this->authorize('view',$persona);
    	$deptos = Departamento::get();
    	$ciudad = $this->lciudad($persona->id_departamento);
    	return view('persona.show',[
    		'persona' => $persona,
    		'deptos' => $deptos,
    		'ciudad' => $ciudad,
    		]);
    }


/**
     * Función para actualizar los datos del modelo persona
     *
     * @param SavePersonaRequest $request
     * @ñaram Persona $persona
     * @return respuesta del servidor según el estado de la transacción.
     */
    public function update(Persona $persona, SavePersonaRequest $request)
    {

    	$persona->update($request->validated());
        return redirect()->route('persona.show', $persona)->with('success','Datos actualizados con éxito');
    }
}


