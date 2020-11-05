<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        if($user->hasRole('Admin')){
            return true;
        }

        if($user->hasRole('Super-admin')){
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
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function view(User $authUser, User $user)
    {

        return $authUser->id === $user->id || $user->hasPermissionTo('View users');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)    {

        return  $user->hasPermissionTo('Create users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id ||  $user->hasPermissionTo('Update users');

        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        //
        return $authUser->id === $user->id  ||$user->hasPermissionTo('Delete users');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
