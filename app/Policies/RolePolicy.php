<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole('Super-admin')) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->hasRole('Admin')  || $user->hasPermissionTo('View roles');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin')  || $user->hasPermissionTo('Create roles');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->hasRole('Admin')  || $user->hasPermissionTo('Update roles');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasRole('Admin')  || $user->hasPermissionTo('Delete roles');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Role $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
