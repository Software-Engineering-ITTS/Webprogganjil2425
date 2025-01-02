<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('ruangan')->get();
        return view('kegiatans.index', compact('kegiatans'));
    }

    public function create()
    {
        $ruangans = Ruangan::all();
        return view('kegiatans.create', compact('ruangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'ruangan_id' => 'required|exists:ruangans,id',
            'aktivitas_mencurigakan' => 'boolean',
        ]);

        Kegiatan::create($request->all());
        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        $ruangans = Ruangan::all();
        return view('kegiatans.edit', compact('kegiatan', 'ruangans'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'ruangan_id' => 'required|exists:ruangans,id',
            'aktivitas_mencurigakan' => 'boolean',
        ]);

        $kegiatan->update($request->all());
        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
