<?php

use Illuminate\Database\Seeder;
use App\Models\Cap;

class CapsTableSeeder extends Seeder
{
    public function run()
    {
        $caps = factory(Cap::class)->times(50)->make()->each(function ($cap, $index) {
            if ($index == 0) {
                // $cap->field = 'value';
            }
        });

        Cap::insert($caps->toArray());
    }

}

