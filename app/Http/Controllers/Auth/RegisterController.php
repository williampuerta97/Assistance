<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        if($request->ajax()){
            
            $admin = new User;

            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->password = bcrypt($request->get('password'));
            
            $result = $admin->save();
                
            if($result == false){
                return response()->json(['res' =>'error']);
            }
        }
    }

    public function listAdmins(){
        $admins = User::all();
        return view('auth.list', compact('admins'));
    }

    public function find($id){
        $admin = User::find($id);
        
        if($admin){
            return View('auth.edit', compact('admin'));
        }
    }

    public function update(Request $request, $id){
        $admin = User::find($id);

        $admin->email = $request->get('email');
        $admin->password = bcrypt($request->get('password'));
        $result = $admin->save();

        if($result){
            return response()->json(["ok"=> true, "message"=>"El registro fue actualizado correctamente"], 200);
        }
        return response()->json(["ok"=> false, "message"=>"Error al actualizar el registro"], 404);
    }
}
