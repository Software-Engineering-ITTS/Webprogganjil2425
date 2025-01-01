<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'deskripsi' => 'nullable',
            'tanggal_kegiatan' => 'required|date',
        ]);

        Kegiatan::create($request->all());
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }
}

