<?php

namespace App\Repositories;

use App\User;

class ColaboradorRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->Colaboradores()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
    
    public function forUser2(User $user)
    {
        return $user->Colaboradores2()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}