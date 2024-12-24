<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Mendapatkan data pengguna yang login

            // Cek role pengguna
            if ($user->role === 'admin') {
                return redirect('/dashboard')->with('success', 'Login Berhasil sebagai Admin');
            } elseif ($user->role === 'anggota') {
                return redirect('/profile')->with('success', 'Login Berhasil sebagai Anggota');
            }
        }
        return back()->with('error', 'Email atau Password salah');
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            "username" => "required",
            "tanggal_lahir" => "required",
            "gender" => "required",
            "email" => "required",
            "telepon" => "required",
            "password" => "required",
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->password = Hash::make(value: $request->password);

        if ($user->save()) {
            return redirect('/login')->with('success', 'Akun berhasil dibuat');
        }
        return redirect('/register')->with('error', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
}
