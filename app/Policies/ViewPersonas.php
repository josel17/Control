<?php

namespace App\Policies;

use App\User;
use App\Persona;
use Illuminate\Auth\Access\HandlesAuthorization;

class ViewPersonas
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
     * @param  \App\Persona  $persona
     * @return mixed
     */
    public function view(User $user, Persona $persona)
    {
        if(Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View users'))
        {
            return $persona->tipo ===1;
        }
        else
        {
            return $persona->tipo === 0;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Create users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Persona  $persona
     * @return mixed
     */
    public function update(User $user, Persona $persona)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Update users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Persona  $persona
     * @return mixed
     */
    public function delete(User $user, Persona $persona)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Delete users');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Persona  $persona
     * @return mixed
     */
    public function restore(User $user, Persona $persona)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Persona  $persona
     * @return mixed
     */
    public function forceDelete(User $user, Persona $persona)
    {
        //
    }
}
