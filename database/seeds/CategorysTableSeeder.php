<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorysTableSeeder extends Seeder
{
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

        $categorys = factory(Category::class)->times(5)->make()->each(function ($category, $index) {
            if ($index == 0) {
                // $category->field = 'value';
            }
        });

        Category::insert($categorys->toArray());
    }

}

