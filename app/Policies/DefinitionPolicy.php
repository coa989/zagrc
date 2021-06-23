<?php

namespace App\Policies;

use App\Models\Definition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DefinitionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Definition  $definition
     * @return mixed
     */
    public function view(User $user, Definition $definition)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->definitions()->today()->count() < 3 && $user->role_id !== 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Definition  $definition
     * @return mixed
     */
    public function update(User $user, Definition $definition)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Definition  $definition
     * @return mixed
     */
    public function delete(User $user, Definition $definition)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Definition  $definition
     * @return mixed
     */
    public function restore(User $user, Definition $definition)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Definition  $definition
     * @return mixed
     */
    public function forceDelete(User $user, Definition $definition)
    {
        //
    }
}
