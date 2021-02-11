<?php

namespace App\Policies;

use App\User;
use App\Factura;
use Illuminate\Auth\Access\HandlesAuthorization;

class VentasPolicy
{
    use HandlesAuthorization;
    public function authorize()
    {
        $this->middleware('auth');
        if(Auth()->user()->hasRole('Admin'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Ventas  $ventas
     * @return mixed
     */
    public function view(User $user, Factura $factura)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Factura $factura)
    {
       return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Create invoice');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Ventas  $ventas
     * @return mixed
     */
    public function update(User $user, Factura $factura)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Ventas  $ventas
     * @return mixed
     */
    public function delete(User $user, Factura $factura)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Ventas  $ventas
     * @return mixed
     */
    public function restore(User $user, Factura $factura)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Ventas  $ventas
     * @return mixed
     */
    public function forceDelete(User $user, Factura $factura)
    {
        //
    }
}
