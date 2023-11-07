<?php

namespace App\Policies;

use App\Models\Projet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Projet $projet): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user , Projet $projet): bool
    {
        return $user->id === $projet->id_user;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Projet $projet): bool
    {
        return $user->id === $projet->id_user;
    }

    /**
     * Determine whether the user can see update the model.
     */
    public function edit(User $user, Projet $projet): bool
    {
        return $user->id === $projet->id_user;
    }

    

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Projet $projet): bool
    {
        return $user->id === $projet->id_user;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Projet $projet): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Projet $projet): bool
    {
        //
    }
}
