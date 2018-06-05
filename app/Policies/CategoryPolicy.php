<?php

namespace App\Policies;

use App\User;
use App\Models\Category;

class CategoryPolicy extends Policy
{
    public function update(User $user, Category $category)
    {
        // return $category->user_id == $user->id;
        return  $user-> role >0;
    }

    public function destroy(User $user, Category $category)
    {
        return  $user-> role >0;
    }
}
