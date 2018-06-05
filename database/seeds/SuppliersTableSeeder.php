<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SuppliersTableSeeder extends Seeder
{
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

        $suppliers = factory(Supplier::class)->times(50)->make()->each(function ($supplier, $index) {
            if ($index == 0) {
                // $supplier->field = 'value';
            }
        });

        Supplier::insert($suppliers->toArray());
    }

}

