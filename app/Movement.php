<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Movement extends Model
{
    protected $table = 'movements';
    protected $primaryKey = 'mov_id';
    protected $fillable = ['mov_type', 'mov_datetime', 'mov_status', 'mov_peo_id'];
    
    public function listEnters()
    {
        $date = Carbon::now();

        $date = $date->format('Y-m-d');
        
        $list = DB::table('movements')
        ->select('peo_id', 'peo_id_number', 'peo_first_name', 'peo_second_name', 
        'peo_last_name', 'peo_second_surname', 'pos_name', DB::Raw("DATE_FORMAT(mov_datetime,'%H:%i:%s') time"), 'mov_id')
        ->join('people', 'people.peo_id', '=', 'movements.mov_peo_id')
        ->join('positions', 'positions.pos_id', '=', 'people.peo_pos_id')
        ->where('mov_type', '=', 'Entrada')
        ->where('mov_datetime', '>=', $date)
        ->orderBy('mov_id', 'desc')
        ->get();
        
        return $list;
    }
    
    public function listExit()
    {
        $date = Carbon::now();

        $date = $date->format('Y-m-d');
        
        $list = DB::table('movements')
        ->select('peo_id', 'peo_id_number', 'peo_first_name', 'peo_second_name', 
        'peo_last_name', 'peo_second_surname', 'pos_name', DB::Raw("DATE_FORMAT(mov_datetime,'%H:%i:%s') time"), 'mov_id')
        ->join('people', 'people.peo_id', '=', 'movements.mov_peo_id')
        ->join('positions', 'positions.pos_id', '=', 'people.peo_pos_id')
        ->where('mov_type', '=', 'Salida')
        ->where('mov_datetime', '>=', $date)
        ->orderBy('mov_id', 'desc')
        ->get();
        
        return $list;
    }
    
    public function listAll()
    {
        $date = Carbon::now();

        $date = $date->format('Y-m-d');
        
        $list = DB::table('movements')
        ->select('peo_id', 'peo_id_number', 'peo_first_name', 'peo_second_name', 
        'peo_last_name', 'peo_second_surname', 'pos_name', 'mov_datetime', 'mov_id', 'mov_type')
        ->join('people', 'people.peo_id', '=', 'movements.mov_peo_id')
        ->join('positions', 'positions.pos_id', '=', 'people.peo_pos_id')
        ->orderBy('movements.mov_id', 'desc')
        ->get();
        
        return $list;
    }
}
