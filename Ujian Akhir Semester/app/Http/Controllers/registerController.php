<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    public function index()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'role' => 'required|in:staff'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'role' => 'staff',
        ]);

        Auth::login($user);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login.');
    }
}
?>