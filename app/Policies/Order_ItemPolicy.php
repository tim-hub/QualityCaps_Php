<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order_Item;

class Order_ItemPolicy extends Policy
{
    public function update(User $user, Order_Item $order__item)
    {
        // return $order__item->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Order_Item $order__item)
    {
        return true;
    }
}
