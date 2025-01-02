<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function indeks(){
        return view("sesi/indeks");
    }

    public function login(Request $request){
        // Validasi email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email yang dimasukkan tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        // Mengambil input dari form
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Proses login
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Berhasil login');
        } else {
            return redirect('sesi')->withErrors('Email dan password tidak valid!');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }
}
