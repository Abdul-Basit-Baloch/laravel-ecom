<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class users extends Controller
{
    public function index(){
        return view('auth.signup');
    }
    
    public function register(Request $request){

        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:8',
                'cpassword'=>'required|same:password',
            ]
        );
        
    }
    public function store(Request $request){
        $users = new user;
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password = md5($request['password']);
        $users->status = $request['1'];
        return redirect()->view('frontend.index');
    }
}
