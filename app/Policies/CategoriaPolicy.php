<?php

namespace App\Policies;

use App\Categoria;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaPolicy
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
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function view(User $user, Categoria $categoria)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('View category');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Create category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function update(User $user, Categoria $categoria)
    {
        return Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Update category');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function delete(User $user, Categoria $categoria)
    {
        Auth()->user()->hasRole('Admin') || Auth()->user()->hasPermissionTo('Delete category');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function restore(User $user, Categoria $categoria)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function forceDelete(User $user, Categoria $categoria)
    {
        //
    }
}
