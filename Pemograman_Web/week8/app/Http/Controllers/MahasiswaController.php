<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('fakultas')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('mahasiswa.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $fakultas = Fakultas::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'fakultas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diupdate!');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }
}
