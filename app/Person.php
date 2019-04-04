<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Person extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'peo_id';
    protected $fillable = ['peo_id_number','peo_first_name','peo_second_name','peo_last_name','peo_second_surname',
    'peo_email', 'peo_gender', 'peo_phone_a', 'peo_phone_b', 'peo_blood_type', 'peo_rh', 'peo_address', 
    'peo_date_of_birth', 'peo_pos_id', 'peo_status'];
    
    public function searchDoc($doc){
        $id = DB::table("people")
        ->select('peo_id')
        ->where('peo_id_number', '=', $doc)
        ->get();
        return $id;
    }
    
    public function loadData(){
        
        $people = DB::table('people')
        ->select('peo_id','peo_id_number','peo_first_name','peo_second_name','peo_last_name','peo_second_surname','peo_pos_id')
        ->get();
        
        return Response::json($people);
    }
    
    public function listPeople(){
        $people = DB::table('people')
        ->select('peo_id','peo_id_number','peo_first_name','peo_second_name','peo_last_name','peo_second_surname','pos_name')
        ->join('positions', 'positions.pos_id', '=', 'people.peo_pos_id')
        ->get();
        
        return $people;
    }
    
    public function getName($doc)
    {
        $user = DB::table('people')
        ->select('peo_first_name', 'peo_second_name', 'peo_last_name', 'peo_second_surname')
        ->where('peo_id_number', '=', $doc)
        ->get();
        
        return $user;
    }
}
