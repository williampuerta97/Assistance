<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "email" => "erichhans10@gmail.com",
            "password" => bcrypt('1234')
        ]);

        User::create([
            "email" => "williampuerta1097@gmail.com",
            "password" => bcrypt('1234')
        ]);
    }
}
