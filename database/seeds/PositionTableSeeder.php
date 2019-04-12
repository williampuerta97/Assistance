<?php

use Illuminate\Database\Seeder;
use App\Position;
use Carbon\Carbon;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            "pos_name" => "Gerente"           
        ]);

        Position::create([
            "pos_name" => "Jefe de desarrollo"            
        ]);

        Position::create([
            "pos_name" => "Director(a) Financiera"
        ]);

        Position::create([
            "pos_name" => "Director(a) Comercial"
        ]);
        
    }
}
