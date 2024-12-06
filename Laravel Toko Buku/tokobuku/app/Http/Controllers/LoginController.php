<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\customer;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $customer = customer::where('email', $request->email)->first();
        if ($customer && $customer->password === $request->password) {
            session(['customer_id' => $customer->id, 'customer' => $customer]);
            return redirect('/customer');
        }

        $admin = admin::where('email', $request->email)->first();
        if ($admin && $admin->password === $request->password) {
            session(['admin_id' => $admin->id, 'admin' => $admin]);
            return redirect('/admin');
        }

        return back()->withErrors(['email' => 'Invalid!']);
    }

    public function logout(Request $request)
    {
        // menghapus session
        $request->session()->flush(); // menghapus semua session

        return redirect('/')->with('success', 'Berhasil logout.');
    }
}
