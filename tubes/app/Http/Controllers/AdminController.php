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
        $users = User::paginate(10);
        return view('admin.dataanggota', compact('users'));
    }

    public function datakegiatan()
    {
        return view('admin.datakegiatan');
    }

    public function store(Request $request) {
        $val_data = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'deskripsi' => 'required',
        ]);

        Kegiatan::create($val_data);

        return redirect('/dashboard/data-kegiatan')->with('success', 'Kegiatan berhasil ditambahkan');
    }
}
