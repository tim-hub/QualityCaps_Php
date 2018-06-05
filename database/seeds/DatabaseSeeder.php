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
		$this->call(SuppliersTableSeeder::class);
        $this->call([
            UsersTableSeeder::class,
            CategorySeeder::class,


        ]);

        factory(App\Cap::class, 15)->create()->each(function ($u) {

        });
    }
}
