<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->email === 'admin@gmail.com' && $request->password === 'admin') {
            Session::put('admin_id', 1);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email or password is incorrect']);
    }

    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please log in first');
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login');
    }
}
