<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;


class UsuariosController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }
 /**
     * Metodo para llamar la vista principal de los usuarios y crear la información de usuarios. 
     *
     * @param Persona $persona 
     * @return Vista principal de los usuarios. 
     */
	public function index(Persona $persona)
	{
		if(Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View users'))
		{
			$datos = User::where('id_persona',$persona->id)->first();

			if(isset($datos))
			{
				$user = $datos;
			}
			else
			{
				$user = new User;
			}
      //Consultar la lista de roles y permisos creados 
			$role = Role::all();
			$permissions = Permission::orderBy('display_name','ASC')->get();
			
			//Retornar la vista usuarios.index con los objetos Roles, Permisos, Persona. 
			return view('usuarios.index',[
				'persona' => $persona,
				'roles' => $role,
				'user' => $user,
				'permissions' => $permissions,
			]);
		}else
		{
			return back()->withInput('info','No tienes permisos para ver usuarios');
		}
	}
	
	 /**
	     * Actualizar la información del usuario con sus permisos y roles. 
	     *
	     * @param User $usuario
	     * @param UpdateUserRequest $request
	     * @return respuesta del servidor según el estado de la transacción 
	     */
	public function update(User $usuario, UpdateUserRequest $request)
	{
		$usuario->update($request->validated());
		return back()->with('success','Usuario actualizados con éxito');
	}
	
	 /**
	     * Crear la información para el nuevo usuario. 
	     *
	     * @param SaveUserRequest $request. 
	     * @return respuesta del servidor según el estado de la transacción
	     */
	public function store(SaveUserRequest $request)
	{
		User::create($request->validated());
		return back()->with('success','Usuario creado con éxito');
	}
	
	 /**
	 * Actualizar la información de rol del usuario cuando se desee
	 *
	 * @param Request $request, User $user.
	 * @return respuesta del servidor según el estado de la transacción. 
	 */
	public function updaterole(Request $request, User $user)
	{

		//Eliminamos todos los roles del usuario
		$user->roles()->detach();

		//Preguntamos si el susuario desea cambiar el rol y si lo desea
		//registramos los roles que trae el array y si no se desean cambiar roles
		//no realizamos ninguna accion
		if($request->filled('roles'))
		{
			$user->assignRole($request->roles);
		}
		//Asignar nuevamente los roles al usuario. 
		$user->syncRoles($request->roles);
		return back()->with('success','Los roles se han actualizado');
	}
	
	 /**
	  * Metodo para actualizar los permisos al usuario. 
	  *
	  * @param Request $request, 
	  * @param User $user
	  * @return respuesta del servidor según el estado de la transacción. 
	  */
	public function updatepermission(Request $request, User $user)
	{

		//Eliminamos todos los permisos del usuario
		$user->permissions()->detach();

		//Preguntamos si el susuario desea cambiar los permisos y lo desea
		//registramos los permisos que trae el array y si no se desean cmabiar permisos
		//no realizamos ninguna accion
		if($request->filled('permissions'))
		{
			$user->givePermissionTo($request->permissions);
		}

		return back()->with('success','Los permisos se han actualizado');
	}

}
