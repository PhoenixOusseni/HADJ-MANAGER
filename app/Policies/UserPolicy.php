<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function view(User $user)
    {
        return $user->role->nom === 'AdministrateurAgence';
    }

    public function create(User $user)
    {
        return $user->role->nom === 'AdministrateurAgence';
    }

    public function update(User $user, User $target)
    {
        return $user->role->nom === 'AdministrateurAgence';
    }

    public function delete(User $user, User $target)
    {
        return $user->role->nom === 'AdministrateurAgence';
    }
}

