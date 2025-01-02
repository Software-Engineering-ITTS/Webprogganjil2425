<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(){
        return view("auth.login");
    }


    function loginPost(Request $request){
        $request->validate([
            "email" =>"required",
            "password" =>"required",
        ]);
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            return redirect()->intended(route("home"));
        }
        return back()->withErrors([
            "email" => "Email atau password salah.",
        ])->onlyInput("email");
    
    }

    public function register(){
        return view("auth.register");
    }

    function registerPost(Request $request){
        $request->validate([
            "name" =>"required",
            "email" =>"required",
            "password" =>"required",
        ]);
$user = new User();
$user->name = $request->name;
$user->email = $request->email;
$user->password = Hash::make($request->password);
if($user->save()){
    return redirect(route("login"))
    ->with("success","Akun ditambahkan");
}
return redirect(route("register"))
->with("error","akun tidak dapat dibuat");
    }
}
