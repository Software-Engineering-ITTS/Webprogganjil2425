<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KegiatanAnggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{

    // public function dashboard() {
    //     $users = Auth::user();
    //     return view('layouts.sidebaranggota', compact('users'));
    // }

    public function profile()
    {
        $users = Auth::user();
        return view('anggota.profile', compact('users'));
    }

    public function kegiatan()
    {
        $users = Auth::user();
        return view('anggota.kegiatan', compact('users'));
    }

    public function join(Request $request, $id)
    {
        $request->validate([
            'iuran' => 'required|numeric|min:5000'
        ]);

        $kegiatans = Kegiatan::find($id);
        $users = auth()->user();

        $kegiatans->users()->attach($users->id, ['iuran' => $request->iuran]);

        return redirect()->back()->with('success', 'Anda berhasil bergabung');
    }
}
