<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cap;

class CapPolicy extends Policy
{
    public function update(User $user, Cap $cap)
    {
        // return $cap->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Cap $cap)
    {
        return true;
    }
}
