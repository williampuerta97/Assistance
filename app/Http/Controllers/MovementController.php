<?php

namespace App\Http\Controllers;

use App\Movement;
use App\Person;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("movement.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->ajax()){
            $movement = new Movement;
            $person = new Person;
            $id = $person->searchDoc($request->get('doc'));
            
            if($id == "")
            {
                return response()->json(['res' =>'error']);            
            }
            else
            {
                $movement->mov_type = $request->get('type');
                $movement->mov_status = "1";
                $movement->mov_peo_id = $id[0]->peo_id;
                $movement->mov_datetime = Carbon::now();
                
                $result = $movement->save();
                
                $user = $person->getName($request->get('doc'));
                
                $route = "";
                
                if($request->get('type') == "Entrada")
                {
                    $route = 'listEnters'; 
                }
                else
                {
                    $route = 'listExit'; 
                }
                
                if($result)
                {
                    return response()->json(['res' => $route, 'user' => $user[0]]); 
                }
                else
                {
                     return response()->json(['res' =>'error']);
                }
            }
            
        }
    }
    
    public function listEnters()
    {
        $lst = new Movement;
        $list = $lst->listEnters();
        return view('movement.list', compact('list'));
    }
    
    public function listExit()
    {
        $lst = new Movement;
        $list = $lst->listExit();
        return view('movement.listexit', compact('list'));
    }
    
    public function listAll()
    {
        $lst = new Movement;
        $list = $lst->listAll();
        return view('movement.listall', compact('list'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function edit(Movement $movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movement $movement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movement $movement)
    {
        //
    }
}
