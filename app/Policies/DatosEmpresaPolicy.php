<?php

namespace App\Policies;

use App\DatosEmpresa;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DatosEmpresaPolicy
{
    use HandlesAuthorization;

      public function authorize()
    {
        $this->middleware('auth');
        return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\DatosEmpresa  $datosEmpresa
     * @return mixed
     */
    public function view(User $user, DatosEmpresa $datosEmpresa)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\DatosEmpresa  $datosEmpresa
     * @return mixed
     */
    public function update(User $user, DatosEmpresa $datosEmpresa)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Update DataApp');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DatosEmpresa  $datosEmpresa
     * @return mixed
     */
    public function delete(User $user, DatosEmpresa $datosEmpresa)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\DatosEmpresa  $datosEmpresa
     * @return mixed
     */
    public function restore(User $user, DatosEmpresa $datosEmpresa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DatosEmpresa  $datosEmpresa
     * @return mixed
     */
    public function forceDelete(User $user, DatosEmpresa $datosEmpresa)
    {
        //
    }
}
