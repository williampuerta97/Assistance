<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('position.index');
    }
    
    public function listPositions(){
        $positions = Position::all();
        
        return View('position.list', compact('positions'));
    }

    public function findPosition($id){
        $position = Position::find($id);
        
        if($position){
            return View('position.edit', compact('position'));
        }
    }

    public function updatePosition(Request $request, $id){
        $position = Position::find($id);

        $position->pos_name = $request->get('area');
        $result = $position->save();

        if($result){
            return response()->json(["ok"=> true, "message"=>"El registro fue actualizado correctamente"], 200);
        }
        return response()->json(["ok"=> false, "message"=>"Error al actualizar el registro"], 404);
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
            
            $position = new Position;
            
            // Validación
            //    return response()->json(['res' =>'error']);            
            //
            $position->pos_name = $request->get('area');
            
            $result = $position->save();
                
            if($result == false){
                return response()->json(['res' =>'error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
