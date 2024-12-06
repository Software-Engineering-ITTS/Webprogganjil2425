<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loggin(Request $request)
    {
        // kondisi jika yang diinput username dan password nya admin, maka masuk ke dashboard admin

        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $username = $validated['username'];
        $password = $validated['password'];
        if ($username === 'admin' && $password === 'admin') {
            session(['admin_logged_in' => true]);
            return view('dashboard');
        }
        if ($username !== 'admin' && $password !== 'admin') {
            session(['customer_logged_in' => true]);
            return view('dashboard');
        }
        return back()->withErrors(['msg' => 'Username atau Password Salah']);
    }
}
