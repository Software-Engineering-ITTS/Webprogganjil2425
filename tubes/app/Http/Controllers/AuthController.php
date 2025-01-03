<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Kegiatan;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/dashboard/admin')->with('success', 'Login Berhasil sebagai Admin');
            } elseif ($user->role === 'anggota') {
                return redirect('/dashboard-anggota/profile')->with('success', 'Login Berhasil sebagai Anggota');
            }
        }
        return back()->with('error', 'Email atau Password salah');
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            "username" => "required",
            "tanggal_lahir" => "required",
            "gender" => "required",
            "email" => "required|email",
            "telepon" => "required|numeric",
            "password" => "required|min:8",
            "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048"
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->password = Hash::make(value: $request->password);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $user->image = $path;
        }

        if ($user->save()) {
            return redirect('/login')->with('success', 'Akun berhasil dibuat');
        }
        return redirect('/register')->with('error');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }

    public function home() {
        $user = Auth::user();
        $kegiatans = Kegiatan::latest()->paginate(10);

        if ($user) {
            return view('home', compact('kegiatans', 'user'));
        }
        return view('home', compact('kegiatans'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $kegiatans = Kegiatan::where('nama_kegiatan', 'like', "%$search%")
            ->orWhere('lokasi_kegiatan', 'like', "%$search%")
            ->paginate(10);

        return view('home', compact('kegiatans', 'search'));
    }
}
