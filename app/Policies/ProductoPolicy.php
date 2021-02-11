<?php

namespace App\Policies;

use App\User;
use App\Producto;
use Illuminate\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function view(User $user, Producto $producto)
    {
       return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View products');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Create products');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function update(User $user, Producto $producto)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Update products');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function delete(User $user, Producto $producto)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Delete products');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function restore(User $user, Producto $producto)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function forceDelete(User $user, Producto $producto)
    {
        //
    }
}
