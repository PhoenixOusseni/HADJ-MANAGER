<?php

namespace App\Policies;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HotelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return in_array($user->role->nom, ['Administrateur', 'AdministrateurAgence']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hotel $hotel)
    {
        return in_array($user->role->nom, ['Administrateur', 'AdministrateurAgence']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return in_array($user->role->nom, ['Administrateur', 'AdministrateurAgence']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hotel $hotel)
    {
        return in_array($user->role->nom, ['Administrateur', 'AdministrateurAgence']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hotel $hotel)
    {
        return in_array($user->role->nom, ['AdministrateurAgence']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Hotel $hotel)
    {
        return in_array($user->role->nom, ['Administrateur']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Hotel $hotel)
    {
        return in_array($user->role->nom, ['Administrateur']);
    }
}
