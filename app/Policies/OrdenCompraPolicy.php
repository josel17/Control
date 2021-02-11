<?php

namespace App\Policies;

use App\User;
use App\OrdenCompra;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrdenCompraPolicy
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
     * @param  \App\OrdenCompra  $ordenCompra
     * @return mixed
     */
    public function view(User $user, OrdenCompra $ordenCompra)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View orders');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Create orders');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrdenCompra  $ordenCompra
     * @return mixed
     */
    public function update(User $user, OrdenCompra $ordenCompra)
    {
       return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Update orders');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrdenCompra  $ordenCompra
     * @return mixed
     */
    public function delete(User $user, OrdenCompra $ordenCompra)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Delete orders');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrdenCompra  $ordenCompra
     * @return mixed
     */
    public function restore(User $user, OrdenCompra $ordenCompra)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\OrdenCompra  $ordenCompra
     * @return mixed
     */
    public function forceDelete(User $user, OrdenCompra $ordenCompra)
    {
        //
    }
}
