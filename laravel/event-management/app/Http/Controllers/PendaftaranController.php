<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('user', 'kegiatan')->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::all();
        return view('user.pendaftaran.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
        ]);

        Pendaftaran::create([
            'user_id' => auth()->id(),
            'kegiatan_id' => $request->kegiatan_id,
        ]);

        return redirect()->route('user.pendaftaran')->with('success', 'Pendaftaran berhasil.');
    }
}
