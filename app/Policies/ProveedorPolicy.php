<?php

namespace App\Policies;

use App\Proveedor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProveedorPolicy
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
     * @param  \App\Proveedor  $proveedor
     * @return mixed
     */
    public function view(User $user, Proveedor $proveedor)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View provider');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
         return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Create provider');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proveedor  $proveedor
     * @return mixed
     */
    public function update(User $user, Proveedor $proveedor)
    {
         return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Update provider');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proveedor  $proveedor
     * @return mixed
     */
    public function delete(User $user, Proveedor $proveedor)
    {
         return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Delete provider');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proveedor  $proveedor
     * @return mixed
     */
    public function restore(User $user, Proveedor $proveedor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proveedor  $proveedor
     * @return mixed
     */
    public function forceDelete(User $user, Proveedor $proveedor)
    {
        //
    }
}
