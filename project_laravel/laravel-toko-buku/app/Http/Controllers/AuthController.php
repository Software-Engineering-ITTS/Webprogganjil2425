<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }

    public function signupPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        }

        return back()->with('error', 'Email atau Password salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
