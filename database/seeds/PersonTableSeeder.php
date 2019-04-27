<?php

use Illuminate\Database\Seeder;
use App\Person;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::create([
            'peo_id_number' => '1107525421',
            'peo_first_name' => 'Erich',
            'peo_second_name' => 'Hans',
            'peo_last_name' => 'Merz',
            'peo_second_surname' => 'Diaz',
            'peo_email' => 'erichhans10@gmail.com', 
            'peo_gender' => 'M', 
            'peo_phone_a' => '3148314106', 
            'peo_phone_b' => '', 
            'peo_blood_type' => 'O', 
            'peo_rh' => '+', 
            'peo_address' => 'Cra 3N #38-70', 
            'peo_date_of_birth' => "1999-10-05", 
            'peo_pos_id' => 12, 
            'peo_status' => 1
        ]);

        Person::create([
            'peo_id_number' => '1234198395',
            'peo_first_name' => 'Lizet',
            'peo_second_name' => 'Dayana',
            'peo_last_name' => 'Cetares',
            'peo_second_surname' => 'Galvis',
            'peo_email' => 'lizethgalvis9@gmail.com', 
            'peo_gender' => 'F', 
            'peo_phone_a' => '3235230669', 
            'peo_phone_b' => '', 
            'peo_blood_type' => 'A', 
            'peo_rh' => '+', 
            'peo_address' => 'No sé bro disculpa', 
            'peo_date_of_birth' => "1999-12-20", 
            'peo_pos_id' => 3, 
            'peo_status' => 1
        ]);

        Person::create([
            'peo_id_number' => '1114898297',
            'peo_first_name' => 'William',
            'peo_second_name' => 'Steven',
            'peo_last_name' => 'Puerta',
            'peo_second_surname' => 'Taquinas',
            'peo_email' => 'williampuerta1097@gmail.com', 
            'peo_gender' => 'M', 
            'peo_phone_a' => '3177576490', 
            'peo_phone_b' => '', 
            'peo_blood_type' => 'A', 
            'peo_rh' => '+', 
            'peo_address' => 'Carrera 76a #1b-27', 
            'peo_date_of_birth' => "1997-10-07", 
            'peo_pos_id' => 2, 
            'peo_status' => 1
        ]);

        Person::create([
            'peo_id_number' => '89765409',
            'peo_first_name' => 'Robert',
            'peo_second_name' => 'Danilo',
            'peo_last_name' => 'Muñoz',
            'peo_second_surname' => 'Guapacha',
            'peo_email' => 'robertmunoz@gmail.com', 
            'peo_gender' => 'M', 
            'peo_phone_a' => '3159876578', 
            'peo_phone_b' => '', 
            'peo_blood_type' => 'O', 
            'peo_rh' => '+', 
            'peo_address' => 'Carrera 2a #12-56', 
            'peo_date_of_birth' => "1971-11-17", 
            'peo_pos_id' => 4, 
            'peo_status' => 1
        ]);
    }
}
