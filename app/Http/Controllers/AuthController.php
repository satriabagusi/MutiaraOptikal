<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function __login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('username', 'password');
        
        if(Auth::attempt($data)) 
        {
            if(Auth::user()->user_role == "1"){
                return redirect('/');
            }else{
                return redirect('/home');
            }
        }else{
            return redirect()->back()->with('error', 'Username/Password Salah');
        }
            
    }

    public function login(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        if(!Auth::check()){
            return redirect("/login");
        }
    }
}
