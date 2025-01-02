<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function show(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $search = $request->input('search');

        if ($search) {
            $karyawan = karyawan::where('nama', 'like', '%' . $search . '%')
                ->orWhere('nip', 'like', '%' . $search . '%')
                ->orWhere('divisi', 'like', '%' . $search . '%')
                ->get();
        } else {
            $karyawan = karyawan::all();
        }

        return view('daftarkaryawan', ['karyawans' => $karyawan]);
    }


    public function create()
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        return view('tambahkaryawan');
    }

    public function store(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $val_data = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('foto'); // mengambil file yang diupload
        $fotoPath = $file->store('uploads', 'public');  // menyimpan file ke folder 'uploads' dan mengambil nama file yang unik
        $val_data['foto'] = $fotoPath;  // menambahkan path foto ke dalam data yang akan disimpan di database

        karyawan::create($val_data);

        return redirect('/admin/daftarkaryawan');
    }

    public function edit(karyawan $karyawan)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        return view('editkaryawan', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, karyawan $karyawan)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $val_data = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($karyawan->foto) {
            $fotoPathLama = storage_path('app/public/' . $karyawan->foto);
            if (file_exists($fotoPathLama)) {
                unlink($fotoPathLama);  // menghapus foto lama
            }
        }

        // menyimpan foto baru
        $file = $request->file('foto');
        $fotoPath = $file->store('uploads', 'public');
        $val_data['foto'] = $fotoPath;

        $karyawan->update($val_data);

        return redirect('/admin/daftarkaryawan');
    }

    public function destroy(karyawan $karyawan)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        if ($karyawan->foto) {
            $fotoPath = storage_path('app/public/' . $karyawan->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);  // menghapus foto dari storage
            }
        }

        // menghapus data yang dipilih berdasrkan id
        karyawan::destroy($karyawan->id);

        // redirect ke halaman utama
        return redirect('/admin/daftarkaryawan');
    }

    public function showforjadwal(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $search = $request->input('search');

        if ($search) {
            $karyawan = karyawan::where('nama', 'like', '%' . $search . '%')
                ->orWhere('nip', 'like', '%' . $search . '%')
                ->get();
        } else {
            $karyawan = karyawan::all();
        }

        return view('jadwalkaryawan', ['karyawans' => $karyawan]);
    }
}
