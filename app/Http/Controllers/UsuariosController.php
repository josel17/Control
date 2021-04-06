<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
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
				$usuario = $datos;
			}
			else
			{
				$usuario = new User;
			}

      //Consultar la lista de roles y permisos creados
			$role = Role::all();
			$permissions = Permission::orderBy('display_name','ASC')->get();

			//Retornar la vista usuarios.index con los objetos Roles, Permisos, Persona.
			return view('usuarios.index',[
				'persona' => $persona,
				'roles' => $role,
				'usuario' => $usuario,
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
		try {
			$usuario->update($request->validated());
			return back()->with('success','Usuario actualizados con éxito');

		} catch (Exception $e) {
			return back()->with('warning','Se ha presentado un error: Info = '.$e->message());
		}
	}

	 /**
	     * Crear la información para el nuevo usuario.
	     *
	     * @param SaveUserRequest $request.
	     * @return respuesta del servidor según el estado de la transacción
	     */
	public function store(SaveUserRequest $request)
	{

		DB::beginTransaction();
		try {
			User::create($request->validated());
			DB::commit();
			return back()->with('success','Usuario creado con éxito');

		} catch (Exception $e) {
			DB::rollback();
			return back()->with('warning','Se ha presentado un error: Info = '.$e->message());
		}
	}

	 /**
	 * Actualizar la información de rol del usuario cuando se desee
	 *
	 * @param Request $request, User $user.
	 * @return respuesta del servidor según el estado de la transacción.
	 */
	public function updaterole(Request $request, User $usuario)
	{

		//Eliminamos todos los roles del usuario
		$usuario->roles()->detach();

		//Preguntamos si el susuario desea cambiar el rol y si lo desea
		//registramos los roles que trae el array y si no se desean cambiar roles
		//no realizamos ninguna accion
		if($request->filled('roles'))
		{
			$usuario->assignRole($request->roles);
		}
		//Asignar nuevamente los roles al usuario.
		$usuario->syncRoles($request->roles);

		return back()->with('success','Los roles se han actualizado');
	}

	 /**
	  * Metodo para actualizar los permisos al usuario.
	  *
	  * @param Request $request,
	  * @param User $usuario
	  * @return respuesta del servidor según el estado de la transacción.
	  */
	public function updatepermission(Request $request, User $usuario)
	{
		try {

			//Eliminamos todos los permisos del usuario
			$usuario->permissions()->detach();

			//Preguntamos si el susuario desea cambiar los permisos y lo desea
			//registramos los permisos que trae el array y si no se desean cmabiar permisos
			//no realizamos ninguna accion
			if($request->filled('permissions'))
			{
				$usuario->givePermissionTo($request->permissions);
			}
				$usuario->syncPermissions($request->permissions);

			return back()->with('success','Los permisos se han actualizado');
		} catch (Exception $e) {
			return back()->with('error','Se ha presentado un error: ',$e->message());
		}
	}

}
