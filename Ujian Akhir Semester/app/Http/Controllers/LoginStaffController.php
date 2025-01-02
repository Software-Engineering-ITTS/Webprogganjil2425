<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginStaffController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
            'role' => ['required', 'in:admin,staff'],
        ]);

        $user = DB::table('users')
        ->where('username', $credentials['username'])
        ->where('role', $credentials['role'])
        ->first();

        if ($user && $user->password === $credentials['password']) {
            
            $request->session()->regenerate();
            // Redirect based on role
            if ($credentials['role'] === 'staff') {
                return redirect()->intended('/dashboardstaff');
            } else {
                return redirect()->intended('');
            }
        }

        return back()->withErrors([
            'login' => 'Username atau password tidak sesuai.',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
