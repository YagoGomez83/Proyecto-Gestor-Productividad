<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the given user can manage other users.
     */
    public function manageUsers(User $user)
    {
        return $user->role === 'coordinator' || $user->role === 'supervisor';
    }
}
