<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function index(User $user): bool
    {
        return true;
    }

    public function update(User $user, User $target): bool
    {
    }

}
