<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }
    
    public function register()
    {
        $user = DB::table('people')
        ->select('*')
        ->get();
        
        return view('home.registertable', compact('user'));
    }
    
    public function inasistencia(Request $request)
    {
        $dateStart = $request->get('fecha_inicio');
        $dateEnd = $request->get('fecha_fin');
        $user = DB::table('people')
        ->select('peo_first_name', 'peo_id_number', 'peo_second_name', 'peo_last_name', 'peo_second_surname', 'pos_name')
        ->join('positions', 'pos_id', '=', 'peo_pos_id')
        ->leftJoin('movements', 'mov_peo_id', '=', 'peo_id')
        ->where('mov_datetime', '>=', $dateStart)
        ->where('mov_datetime', '<=', $dateEnd)
        ->whereNull('mov_peo_id')
        ->get();
        
        return view('home.inasistencia', compact('user'));
    }
    
    public function estadistica()
    {
        /*SELECT peo_first_name, SEC_TO_TIME( AVG( TIME_TO_SEC( DATE_FORMAT( mov_datetime,  '%H:%i' ) ) ) ) promedio
        FROM people
        INNER JOIN movements ON peo_id = mov_peo_id
        WHERE mov_type =  'Entrada'
        GROUP BY mov_peo_id*/
    }
    
    public function report()
    {
        $user = DB::table('people')
        ->select('peo_id_number', 'peo_first_name', 'peo_second_name', 'peo_last_name', 'peo_second_surname', 
        'pos_name', 'mov_type', 'mov_datetime')
        ->join('positions', 'pos_id', '=', 'peo_pos_id')
        ->join('movements', 'mov_peo_id', '=', 'peo_id')
        ->where('mov_type', '=', 'Entrada')
        ->where('mov_datetime', '>=', Carbon::parse(Carbon::now())->format('Y-m-d'))
        ->get();
        
        return view('home.report', compact('user'));
    }
    
    public function reportFilter($fecha_inicio, $fecha_fin, $type)
    {
        $user = $this->filter($fecha_inicio, $fecha_fin, $type);
        
        return view('home.report', compact('user'));
    }
    
    public function exportExcel($fecha_inicio, $fecha_fin, $type)
    {
        $user = "";
                    
        $user = $this->filter($fecha_inicio, $fecha_fin, $type);
        
        Excel::create('Reporte', function ($excel) use ($user) {
            
            $excel->sheet('Reporte', function ($sheet) use ($user) {
                
            $sheet->row(1, [
                'N° identidad', 'Primer Nombre', 'Segundo Nombre', 'Primer Apellido', 'Segundo Apellido', 'Cargo', 'Concepto', 'Horario'
            ]);
            
            foreach($user as $index => $u) {
                $sheet->row($index+2, [
                    $u->peo_id_number, $u->peo_first_name, $u->peo_second_name, $u->peo_last_name, $u->peo_second_surname, $u->pos_name, $u->mov_type, $u->mov_datetime
                ]);	
            }

                //$sheet->with(json_decode( json_encode($user), true), null, 'A1', false, false);
            });
            
        })->download('xlsx');
        
    }
    
    public function exportPDF($fecha_inicio, $fecha_fin, $type)
    {
        $params = [
            "fecha_inicio" => $fecha_inicio,
            "fecha_fin" => $fecha_fin,
            "type" => $type
        ];
        
        $users = $this->filter($fecha_inicio, $fecha_fin, $type);
        
        $pdf = PDF::loadView('pdf.report', compact('users', 'params'));
        
        return $pdf->download('Reporte_'.$fecha_inicio.'_'.$fecha_fin.'_'.$type.'.pdf');
    }
    
    public function filter($fecha_inicio, $fecha_fin, $type)
    {
        $user = "";
        if($type == "Todo"){
            
            $sql = "SELECT peo_id_number, peo_first_name, peo_second_name, peo_last_name, peo_second_surname, 
            pos_name, mov_type, mov_datetime FROM people p INNER JOIN positions po ON p.peo_pos_id = po.pos_id 
            INNER JOIN movements m ON p.peo_id = m.mov_peo_id WHERE CAST(mov_datetime AS DATE) BETWEEN 
             '$fecha_inicio' AND '$fecha_fin' ORDER BY mov_datetime";
            $user = DB::select($sql);                            

        }else if($fecha_inicio == $fecha_fin){
            
            $sql = "SELECT peo_id_number, peo_first_name, peo_second_name, peo_last_name, peo_second_surname, 
            pos_name, mov_type, mov_datetime FROM people p INNER JOIN positions po ON p.peo_pos_id = po.pos_id 
            INNER JOIN movements m ON p.peo_id = m.mov_peo_id WHERE ";

            if($type != "Todo"){
                $sql .= " mov_type = '$type' AND ";
            }

            $sql .= "CAST(mov_datetime AS DATE) = '$fecha_inicio' ORDER BY mov_datetime";

            $user = DB::select($sql);                            
        }else{
            /*$user = DB::table('people')
            ->select('peo_id_number', 'peo_first_name', 'peo_second_name', 'peo_last_name', 'peo_second_surname', 
            'pos_name', 'mov_type', 'mov_datetime')
            ->join('positions', 'pos_id', '=', 'peo_pos_id')
            ->join('movements', 'mov_peo_id', '=', 'peo_id')
            ->where('mov_type', '=', $type)
            ->whereBetween('mov_datetime', [$fecha_inicio, $fecha_fin])            
            ->orderBy('mov_datetime')
            ->get();     */
            $sql = "SELECT peo_id_number, peo_first_name, peo_second_name, peo_last_name, peo_second_surname, 
            pos_name, mov_type, mov_datetime FROM people p INNER JOIN positions po ON p.peo_pos_id = po.pos_id 
            INNER JOIN movements m ON p.peo_id = m.mov_peo_id WHERE mov_type = '$type' AND CAST(mov_datetime AS DATE) BETWEEN 
             '$fecha_inicio' AND '$fecha_fin' ORDER BY mov_datetime";
            $user = DB::select($sql);                            
        }              
        return $user;
    }
    
    public function returnHome()
    {
        return view('home.home');
    }
    
}
