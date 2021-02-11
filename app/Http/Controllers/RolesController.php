<?php

namespace App\Http\Controllers;


use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\SaveRoleRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\AuthorizationException;

class RolesController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

            return view('usuarios.roles.index',[
                'roles' => Role::paginate(10),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if(Auth()->user()->hasPermission()
        return view('usuarios.roles.create',[
                    'role' => new Role,
                    'permissions' => Permission::all(),
                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRoleRequest $request)
    {
        $role = Role::create($request->validated());
        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }
        return redirect(Route('persona.usuarios.roles.index'))->with('success','Role creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('view',$role);

        $permissions = Permission::all();
        return view('usuarios.roles.create',[
            'role' => $role,
            'permissions' => $permissions,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRoleRequest $request,Role $role)
    {

        $this->authorize('update',$role);

        //Actualizamos el role
        $role->update($request->validated());

        //Eliminamos los permisos
        $role->permissions()->detach();

        //Si el usuario ha seleccionado algun permiso se lo asignamos nuevamente
        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        //Regresamos a la ruta anteior
        return back()->with('success','Role actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try
        {
            $this->authorize('delete', $role);
            $role->delete();
            return back()->with('success','Role eliminado con exito');
        }
        catch (Exception $ex)
        {
            return back()->with('info','Ha ocurrido un error al eliminar el role'.$ex->messague());
        }


    }
}
