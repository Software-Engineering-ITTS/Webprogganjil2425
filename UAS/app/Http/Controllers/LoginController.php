<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|',
            'password' => 'required|',
        ]);

        
        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->route('customers.index');
        }

        
        return back()->withErrors(['name' => 'Invalid credentials'])->withInput();
    }

   

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
