<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\karyawan;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('loginadmin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $karyawan = karyawan::where('email', $request->email)->first();
        if ($karyawan && $karyawan->password === $request->password) {
            session(['karyawan_id' => $karyawan->id, 'karyawan' => $karyawan]);
            return redirect('/karyawan');
        }

        $admin = admin::where('email', $request->email)->first();
        if ($admin && $admin->password === $request->password) {
            session(['admin_id' => $admin->id, 'admin' => $admin]);
            return redirect('/admin');
        }

        return back()->with('error', 'Invalid!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // menghapus semua session

        return redirect('/')->with('success', 'Berhasil logout.');
    }
}