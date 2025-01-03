<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'password' => 'required',
        ]);


            $identifier = $request->input('identifier');
            $password = $request->input('password');

        // Cek jika user adalah admin
        if ($identifier === 'qadmin' && $password === 'qadmin123') {
            // Auth::logout(); // Tidak perlu autentikasi laravel default
            return redirect()->route('dashboardadmin');
        }

        //autentikasi menggunakan field untuk menegcek apakah yang dimasukkan adalah email atau username
        $fieldType = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

       //autentikai jika yang masuk bukan admin
    //    if (Auth::attempt([$fieldType => $identifier, 'password' => $password], $request-> has('remember'))){
        return redirect()->route('dashboardpengguna');
       

        return back()->withErrors([
            'identifier' => 'Inputan Salah.',
        ])->withInput($request->only('identifier'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
