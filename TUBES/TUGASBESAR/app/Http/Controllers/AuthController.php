<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        
        \Log::info('Register request:', $request->all());

    
        try {
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,  // Menyimpan password langsung tanpa hashing
                'role' => 'user',
            ]);

            // \Log::info('User registered:', $user);  // Debug: melihat apakah user berhasil disimpan
            \Log::info('User registered:', $user->toArray());
            return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login!');
        } catch (\Exception $e) {
            \Log::error('Error during registration: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat registrasi.']);
        }
    }

   




    
    // LOGIN
    public function login(Request $request)
    {
        // Validasi kredensial
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Cari user berdasarkan email
        $user = DB::table('users')
            ->where('email', $credentials['email'])
            ->first();
    
        // Cek apakah user ditemukan dan password sesuai
        if ($user&& $credentials['password'] == $user->password) {
            // Cek role
            if ($user->role === 'admin') {
                Auth::loginUsingId($user->id);
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'user') {
                Auth::loginUsingId($user->id);
                $request->session()->regenerate();
                return redirect()->intended('/user/daftar');
            } else {
                return back()->withErrors([
                    'email' => 'Akses tidak diizinkan untuk peran ini.',
                ])->onlyInput('email');
            }
        }
    
        // Jika autentikasi gagal, kembali dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
    
    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
