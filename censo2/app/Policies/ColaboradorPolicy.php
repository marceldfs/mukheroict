<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ColaboradorPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
        /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Colaborador  $colaborador
     * @return bool
     */
    public function destroy(User $user, Colaborador $colaborador)
    {
        return $user->id === $colaborador->user_id;
    }
}
