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

			$role = Role::all();
			$permissions = Permission::orderBy('display_name','ASC')->get();
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

	public function update(User $usuario, UpdateUserRequest $request)
	{
		$usuario->update($request->validated());
		return back()->with('success','Usuario actualizados con éxito');
	}

	public function store(SaveUserRequest $request)
	{
		User::create($request->validated());
		return back()->with('success','Usuario creado con éxito');
	}

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

		$user->syncRoles($request->roles);
		return back()->with('success','Los roles se han actualizado');
	}

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
