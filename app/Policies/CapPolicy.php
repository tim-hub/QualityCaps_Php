<?php

namespace App\Policies;

use App\User;
use App\Models\Cap;
use Illuminate\Support\Facades\Log;

class CapPolicy extends Policy
{
    public function update(User $user, Cap $cap)
    {
        // return $cap->user_id == $user->id;
        Log::info('Showing user profile for user: '.$user);
        return  $user-> role >0 ;
    }

    public function destroy(User $user, Cap $cap)
    {
        return  $user-> role >0 ;
    }
}
