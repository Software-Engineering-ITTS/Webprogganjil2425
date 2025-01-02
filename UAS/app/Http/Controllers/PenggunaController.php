<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use App\Models\event;
use App\Models\kehadiran;

class PenggunaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
        'username' => 'required',
        'password' => 'required',
        'namalengkap' => 'required',
        'handphone' => 'required',
        'alamat' => 'required',
        'role' => 'required',
        ]);
        // Simpan data ke database
        pengguna::create($validatedData);

        // Redirect ke halaman sukses
        return redirect('/login');
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $pengguna = pengguna::where('username', $request->username)->first();

    if ($pengguna && $pengguna->password == $request->password) {
        if($pengguna->role == "admin"){
            $data = event::all();
            return view('menuadmin', ['data' => $data]);
        }else{
            $data = event::all();
            return view('menuuser', ['data' => $data]);
        }
    }else{
        return back();
    }
}
}
