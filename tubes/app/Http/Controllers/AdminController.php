<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        $users = User::count();
        $kegiatans = Kegiatan::count();
        $iuran = DB::table('kegiatan_anggotas')->sum('iuran');
        return view('admin.dashboard', compact('users', 'kegiatans', 'iuran'));
    }

    public function dataanggota()
    {
        return view('admin.dataanggota');
    }

    public function showDataAnggota()
    {
        $users = User::latest()->paginate(10);
        return view('admin.dataanggota', compact('users'));
    }

    public function showInfoAnggota($id)
    {
        $users = User::with('kegiatans')->findOrFail($id);
        return view('admin.infoanggota', compact('users'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('username', 'like', "%$search%")
            ->orWhere('telepon', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->paginate(10);

        return view('admin.dataanggota', compact('users', 'search'));
    }

    public function datakegiatan()
    {
        return view('admin.datakegiatan');
    }

    public function showDataKegiatan()
    {
        $kegiatans = Kegiatan::latest()->paginate(7);
        return view('admin.datakegiatan', compact('kegiatans'));
    }

    public function infoKegiatan($id)
    {
        $kegiatans = Kegiatan::with('users')->find($id);

        if (!$kegiatans) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }
        return view('admin.infokegiatan', compact('kegiatans'));
    }

    public function searchKegiatan(Request $request)
    {
        $search = $request->input('search');

        $kegiatans = Kegiatan::where('nama_kegiatan', 'like', "%$search%")
            ->orWhere('lokasi_kegiatan', 'like', "%$search%")
            ->paginate(7);

        return view('admin.datakegiatan', compact('kegiatans', 'search'));
    }

    public function store(Request $request)
    {
        $val_data = $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'deskripsi' => 'required',
        ]);

        if (Kegiatan::create($val_data)) {
            return redirect('/dashboard/data-kegiatan')->with('success', 'Kegiatan baru berhasil ditambahkan');
        }
        return redirect('/dashboard/data-kegiatan')->with('error', 'Kegiatan baru gagal ditambahkan');
    }

    public function edit($id)
    {
        $kegiatans = Kegiatan::find($id);
        return view('admin.updatekegiatan', compact('kegiatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'deskripsi' => 'required',
        ]);

        $kegiatans = Kegiatan::find($id);
        $kegiatans->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'lokasi_kegiatan' => $request->lokasi_kegiatan,
            'waktu_kegiatan' => $request->waktu_kegiatan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/dashboard/data-kegiatan')->with('success', 'Kegiatan berhasil diupdate');
    }

    public function destroy($id)
    {
        $kegiatans = Kegiatan::find($id);
        $kegiatans->delete();

        return redirect('/dashboard/data-kegiatan')->with('success', 'Kegiatan berhasil dihapus');
    }
}
