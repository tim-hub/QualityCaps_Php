<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(Order_ItemsTableSeeder::class);
		$this->call(OrdersTableSeeder::class);
		// $this->call(UssTableSeeder::class);

		$this->call(CategorysTableSeeder::class);
		$this->call(SuppliersTableSeeder::class);
        $this->call(CapsTableSeeder::class);
        $this->call([
            UsersTableSeeder::class,
        ]);

    }
}
