<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PositionTableSeeder::class);
        $this->call(PersonTableSeeder::class);
    }
}
