<?php

namespace App\Http\Controllers;

use App\Person;
use App\Position;
use Illuminate\Http\Request;
use Response;
use DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return View('person.index', compact('positions'));
    }
    
    public function listPeople(){
        $people = new Person();
        $list = $people->listPeople();
        return View('person.list', compact('list'));
    }
    
    public function findPerson($id){
        $person = Person::find($id);
        $positions = Position::all();
        
        return View('person.edit', compact('person', 'positions'));
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
        //dd('asd');
        if($request->ajax()){
            
            $person = new Person;
            
            // Validación
            //    return response()->json(['res' =>'error']);            
            //
            $person->peo_id_number = $request->get('id_number');
            $person->peo_first_name = $request->get('first_name');
            $person->peo_second_name = $request->get('second_name');
            $person->peo_last_name = $request->get('last_name');
            $person->peo_second_surname = $request->get('second_surname');
            $person->peo_email = $request->get('email');
            $person->peo_gender = $request->get('gender');
            $person->peo_phone_a = $request->get('phone_a');
            $person->peo_phone_b = $request->get('phone_b');
            $person->peo_blood_type = $request->get('blood_type');
            $person->peo_rh = $request->get('rh');
            $person->peo_address = $request->get('address');
            $person->peo_date_of_birth = $request->get('date');
            $person->peo_pos_id = $request->get('pos');
            $person->peo_status = 1;
            
            $result = $person->save();
                
            if($result == false){
                return response()->json(['res' =>'error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->ajax()){
            
            $person = Person::find($id);
            
            // Validación
            //    return response()->json(['res' =>'error']);            
            //
            $person->peo_id_number = $request->get('id_number');
            $person->peo_first_name = $request->get('first_name');
            $person->peo_second_name = $request->get('second_name');
            $person->peo_last_name = $request->get('last_name');
            $person->peo_second_surname = $request->get('second_surname');
            $person->peo_email = $request->get('email');
            $person->peo_gender = $request->get('gender');
            $person->peo_phone_a = $request->get('phone_a');
            $person->peo_phone_b = $request->get('phone_b');
            $person->peo_blood_type = $request->get('blood_type');
            $person->peo_rh = $request->get('rh');
            $person->peo_address = $request->get('address');
            $person->peo_date_of_birth = $request->get('date');
            $person->peo_pos_id = $request->get('pos');
            $person->peo_status = 1;
            
            $result = $person->save();
                
            if($result == false){
                return response()->json(['res' =>'error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
    
    public function delete($id){
        $person = Person::find($id);
        $result = $person->delete();
        
        if($result == false){
                return response()->json(['res' =>'error']);
        }
    }
}
