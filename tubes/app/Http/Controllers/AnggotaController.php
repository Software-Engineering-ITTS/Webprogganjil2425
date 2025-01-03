<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KegiatanAnggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $kegiatans = $users->kegiatans;
        return view('anggota.kegiatan', compact('users', 'kegiatans'));
    }

    public function iuran($id)
    {
        $kegiatans = Kegiatan::find($id);
        return view('anggota.iuran', compact('kegiatans'));
    }

    public function join(Request $request, $id)
    {
        $request->validate([
            'iuran' => 'required|numeric|min:5000'
        ]);

        $kegiatans = Kegiatan::find($id);
        $users = auth()->user();

        if ($kegiatans->users()->wherePivot('user_id', $users->id)->exists()) {
            return redirect('/')->with('error', 'Anda sudah bergabung dalam kegiatan ini.');
        }

        $kegiatans->users()->attach($users->id, ['iuran' => $request->iuran]);

        return redirect('/')->with('success', 'Anda berhasil bergabung');
    }
}
