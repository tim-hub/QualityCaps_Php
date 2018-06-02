<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id');

            $table->integer('status');

            $table->string('receiver_name', 100);

            $table->decimal('gst', 10, 2) -> default(0.15);
            $table->decimal('grand_total', 18, 2);

            $table->string('address', 100);
            $table->string('city', 100);
            $table->string('country', 100);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
