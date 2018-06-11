<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAddAddress extends Migration
{
	public function up()
	{
        Schema::table('users', function (Blueprint $table) {
            $table->text('address')->nullable();
        });
	}

	public function down()
	{

	}
}
