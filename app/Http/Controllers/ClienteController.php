<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use App\Departamento;
use App\Persona;


class ClienteController extends Controller
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
        if(Auth()->user()->hasRole('Admin'))
        {
            $tipoform = 'cliente';
            $deptos = Departamento::get();
            $personas = Persona::where('tipo',2)->with(['user'])->paginate(10);
            $titleModal = 'Crear nuevo Cliente';
            $title = 'Lista de clientes registrados';
            //$users = User::get();
            return view('cliente.index',compact('personas','deptos','title','titleModal','tipoform'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $request->tipo = 2;
        Persona::create($request->validated());
        return back()->with('success','Cliente registrado exitosamente');
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
