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
            "email" => "admin@empresa.com",
            "password" => bcrypt('1234')
        ]);

        User::create([
            "email" => "recepcion@empresa.com",
            "password" => bcrypt('1234')
        ]);
    }
}
