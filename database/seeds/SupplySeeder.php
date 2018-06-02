<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'name' => 'baidu',
            'description' => 'baidu caps',
        ]);
        DB::table('suppliers')->insert([
            'name' => 'google',
            'description' => 'google caps',
        ]);
        DB::table('suppliers')->insert([
            'name' => 'facebook',
            'description' => 'facebook caps',
        ]);
        factory(App\Supplier::class, 5)->create()->each(function ($u) {

        });
    }
}
