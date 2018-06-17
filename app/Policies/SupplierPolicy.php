<?php

namespace App\Policies;

use App\User;
use App\Models\Supplier;

class SupplierPolicy extends Policy
{
    public function update(User $user, Supplier $supplier)
    {
        // return $supplier->user_id == $user->id;
        return  $user-> role >0;
    }

    public function destroy(User $user, Supplier $supplier)
    {
        return  $user-> role >0;
    }


}
