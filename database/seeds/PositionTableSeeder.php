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
        
        Position::create([
            "pos_name" => "Coordinador(a) RRHH"
        ]);
        
        Position::create([
            "pos_name" => "Analista Contable"
        ]);
        
        Position::create([
            "pos_name" => "Analista de control de calidad"
        ]);
        
        Position::create([
            "pos_name" => "Auxiliar de servicio al cliente"
        ]);
        
        Position::create([
            "pos_name" => "Director(a) Administrativa"
        ]);
        
        Position::create([
            "pos_name" => "Analista de planeación"
        ]);
        
        Position::create([
            "pos_name" => "Auxiliar de monitoreo"
        ]);
        
        Position::create([
            "pos_name" => "Coordinador(a) Tecnología e Informática"
        ]);
        
    }
}
