<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, User $user)
    {
        // Prevent updating the first user
        return $user->id !== 1;
    }

    public function delete(User $currentUser, User $user)
    {
        // Prevent deleting the first user
        return $user->id !== 1;
    }
}
