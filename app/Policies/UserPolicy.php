<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    // public function viewAny(User $usera)
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $usera "Usuario autenticado"
     * @param  \App\User  $model --->> $user El usuario normal
     * @return mixed
     */
    public function view(User $usera, User $user, $perm=NULL) //$usera Usuario conectado $user usuario a ver
    {
        //$this->authorize('view', [$user,['user.show','userown.show']]);
        //$perm = [$user,['user.show','userown.show']] 
        if ($usera->havePermission($perm[0])) {
            return true; //Tengo el permiso user.show de manera global
        } else
        if ($usera->havePermission($perm[1])) {
            return $usera->id === $user->id; // Tengo el permiso userown.show para ver solo mi usuario
        }
        else
        {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $usera "Usuario autenticado"
     * @return mixed
     */
    public function create(User $usera)
    {
        //
    }


    public function update(User $usera, User $user, $perm=NULL)
    {
        //$this->authorize('view', [$user,['user.show','userown.show']]);
        //$perm = [$user,['user.show','userown.show']] 
        if ($usera->havePermission($perm[0])) {
            return true; //Tengo el permiso user.show de manera global
        } else
        if ($usera->havePermission($perm[1])) {
            return $usera->id === $user->id; // Tengo el permiso userown.show para ver solo mi usuario
        }
        else
        {
            return false;
        }
    }

    // public function delete(User $usera, User $user)
    // {
    //     //
    // }

    // public function restore(User $usera, User $user)
    // {
    //     //
    // }

    // public function forceDelete(User $usera, User $user)
    // {
    //     //
    // }
}
