<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Models\Projet;
use Illuminate\Auth\Access\Response;

class TaskPolicy
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
    public function view(User $user, Task $task): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Projet $projet): bool
    {
        return $user->id === $projet->id_user;
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        return $user->id === $task->projet->id_user;

    }
   
    public function show(User $user, Projet $projet): bool
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
    public function restore(User $user, Task $task): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        //
    }
}
