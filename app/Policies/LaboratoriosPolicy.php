<?php

namespace App\Policies;

use App\Laboratorio;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaboratoriosPolicy
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
    public function viewAny()
    {
       return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View laboratory');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Laboratorio  $laboratorio
     * @return mixed
     */
    public function view(User $user, Laboratorio $laboratorio)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View laboratory');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Laboratorio $laboratorio)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Create laboratory');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Laboratorio  $laboratorio
     * @return mixed
     */
    public function update(User $user, Laboratorio $laboratorio)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Update laboratory');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Laboratorio  $laboratorio
     * @return mixed
     */
    public function delete(User $user, Laboratorio $laboratorio)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Delete laboratory');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Laboratorio  $laboratorio
     * @return mixed
     */
    public function restore(User $user, Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Laboratorio  $laboratorio
     * @return mixed
     */
    public function forceDelete(User $user, Laboratorio $laboratorio)
    {
        //
    }
}
