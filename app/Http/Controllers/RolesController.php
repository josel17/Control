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
 /**
     * Metodo para llamar la vista principal Role
     *
     * @param  
     * @return Vista roles.index
     */
    public function index()
    {
      return view('usuarios.roles.index',
      ['roles' => Role::paginate(10)]);
    }

    /**
     * Llamar la vista para crear un nuevo Rol. 
     *
     * @return Vista con el formulario. 
     */
    public function create()
    {
        z//if(Auth()->user()->hasPermission()
        return view('usuarios.roles.create',[
                    'role' => new Role,
                    'permissions' => Permission::all(),
                    ]);
    }

    /**
     * Metodo para guardar la información del nuevo rol creado. 
     *
     * @param  SaveRoleRequest $request
     * @return Respuesta del servidor según el estado de la transacción.
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
     * Vista para visualizar la información del Rol
     *
     * @param  Rol $rol
     * @return Vista roles.create 
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
     * Show the form for editing the specified .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

    }

    /**
     * Metodo para actualizar la información de los roles. 
     *
     * @param SaveRoleRequest $request 
     * @param  Role $role
     * @return Respuesta del servidor según el estado de la transacción. 
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
     * Eliminar el rol seleccionado. 
     *
     * @param Role $role
     * @return respuesta del servidor según el estado de la transacción. 
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
