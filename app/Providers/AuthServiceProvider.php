<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Order_Item::class => \App\Policies\Order_ItemPolicy::class,
		 \App\Models\Order::class => \App\Policies\OrderPolicy::class,
		 \App\User::class => \App\Policies\UserPolicy::class,
		 \App\Models\Cap::class => \App\Policies\CapPolicy::class,
		 \App\Models\Category::class => \App\Policies\CategoryPolicy::class,
		 \App\Models\Supplier::class => \App\Policies\SupplierPolicy::class,
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
