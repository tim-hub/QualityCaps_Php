<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Men',
            'description' => 'men\'s fashion',
        ]);
        DB::table('categories')->insert([
            'name' => 'women',
            'description' => 'beauties',
        ]);
        DB::table('categories')->insert([
            'name' => 'kids',
            'description' => 'cute',
        ]);

        factory(App\Category::class, 5)->create()->each(function ($u) {

        });
    }
}
