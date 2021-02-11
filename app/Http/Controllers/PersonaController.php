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
			return back()->withInput();
		}
	}

	public function store(SavePersonaRequest $request)
	{
        $request->tipo = 1;
		Persona::create($request->validated());
		return redirect()->route('persona.index');
	}

	 public function lciudad($id)
    {
    	return Ciudad::where('id_departamento',$id)->get();
    }

    public function show(Persona $persona)
    {
    	$this->authorize('view',$persona);
    	$deptos = Departamento::get();
    	$ciduad = $this->lciudad($persona->id_departamento);
    	return view('persona.show',[
    		'persona' => $persona,
    		'deptos' => $deptos,
    		'ciduad' => $ciduad,
    		]);
    }

    public function update(Persona $persona, SavePersonaRequest $request)
    {

    	$persona->update($request->validated());
        return redirect()->route('persona.show', $persona)->with('success','Datos actualizados con éxito');
    }
}


