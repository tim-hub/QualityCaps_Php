<?php

namespace App\Policies;

use App\User;

class UserPolicy extends Policy
{
    public function update(User $user_cmd, User $user)
    {
        // return $user->user_id == $user->id;
        return true;
    }

    public function destroy(User $user_cmd, User $user)
    {
        return true;
    }
}
