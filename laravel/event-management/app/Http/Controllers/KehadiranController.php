<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadirans = Kehadiran::with('pendaftaran.user', 'pendaftaran.kegiatan')->get();
        return view('admin.kehadiran.index', compact('kehadirans'));
    }

    public function create()
    {
        $pendaftarans = Pendaftaran::where('user_id', auth()->id())->get();
        return view('user.kehadiran.create', compact('pendaftarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftarans,id',
        ]);

        Kehadiran::create([
            'pendaftaran_id' => $request->pendaftaran_id,
            'hadir' => true,
        ]);

        return redirect()->route('user.kehadiran')->with('success', 'Kehadiran berhasil dikonfirmasi.');
    }
}
