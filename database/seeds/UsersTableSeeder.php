<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin'.'@mail.com',
            'password' => bcrypt('12345678'),
            'enabled' => true,
            'email_confirmed' => true,
            'role' => 9,
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1'.'@mail.com',
            'password' => bcrypt('12345678'),
            'enabled' => true,
            'email_confirmed' => true,
            'role' => 0,
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2'.'@mail.com',
            'password' => bcrypt('12345678'),
            'enabled' => false,
            'email_confirmed' => false,
            'role' => 0,
        ]);


        factory(App\User::class, 2)->create()->each(function ($u) {

        });
    }
}
