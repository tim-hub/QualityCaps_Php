<?php

namespace App\Policies;

use App\User;
use App\Models\Order;

class OrderPolicy extends Policy
{
    public function view(User $user)
    {
        // return $order->user_id == $user->id;

        return  $user-> role >0;
    }


    public function update(User $user, Order $order)
    {
        // return $order->user_id == $user->id;

        return  $user-> role >0;
    }

    public function destroy(User $user, Order $order)
    {
        return  $user-> role >0;
    }
}
