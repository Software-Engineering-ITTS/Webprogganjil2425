<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            'terms' => 'accepted',
        ]);

        $user = new User();

        $user->id = Str::uuid();
        $user->email = $request->email;
        $user->name = $request->name;
        // password aku hashing agar tidak terlihat didatabase
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('register')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login(){
        return view('auth.login');
    }

    public function LoginPost(Request $request){
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credetials)){
            return redirect('/dashboard')->with('success', 'Login Successfully');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
