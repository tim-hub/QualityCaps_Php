<?php

use Illuminate\Database\Seeder;
use App\Models\Order_Item;

class Order_ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $order__items = factory(Order_Item::class)->times(50)->make()->each(function ($order__item, $index) {
            if ($index == 0) {
                // $order__item->field = 'value';
            }
        });

        Order_Item::insert($order__items->toArray());
    }

}

