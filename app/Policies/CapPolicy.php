<?php

namespace App\Policies;

use App\User;
use App\Models\Cap;

class CapPolicy extends Policy
{
    public function update(User $user, Cap $cap)
    {
        // return $cap->user_id == $user->id;
        return  $user-> role >0 ;
    }

    public function destroy(User $user, Cap $cap)
    {
        return  $user-> role >0 ;
    }
}
