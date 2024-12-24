<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataanggota()
    {
        return view('admin.dataanggota');
    }

    public function showDataAnggota()
    {
        $users = User::all();
        return view('admin.dataanggota', compact('users'));
    }

    public function datakegiatan()
    {
        return view('admin.datakegiatan');
    }

    public function showDataKegiatan()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.datakegiatan', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $val_data = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'deskripsi' => 'required',
        ]);

        if (Kegiatan::create($val_data)) {
            return redirect('/dashboard/data-kegiatan')->with('success', 'Kegiatan baru berhasil ditambahkan');
        }
        return redirect('/dashboard/data-kegiatan')->with('error', 'Kegiatan baru gagal ditambahkan');
    }

    public function edit($id) {
        $kegiatans = Kegiatan::find($id);
        return view('admin.updatekegiatan', compact('kegiatans'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'deskripsi' => 'required',
        ]);

        $kegiatans = Kegiatan::find($id);
        $kegiatans->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'lokasi_kegiatan' => $request->lokasi_kegiatan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/dashboard/data-kegiatan')->with('success', 'Kegiatan berhasil diupdate');
    }

    public function destroy($id) {
        $kegiatans = Kegiatan::find($id);
        $kegiatans->delete();

        return redirect('/dashboard/data-kegiatan')->with('success', 'Kegiatan berhasil dihapus');
    }
    
}
