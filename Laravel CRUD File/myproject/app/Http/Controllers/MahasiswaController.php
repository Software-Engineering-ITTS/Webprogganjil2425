<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // view
    public function index()
    {
        $mahasiswas = mahasiswa::all();
        $fakultas = fakultas::all();
        return view('index', ['mahasiswas' => $mahasiswas], ['fakultas' => $fakultas]);
    }

    // store -> add
    public function store(Request $request)
    {
        // memvalidasi data yang dikirmkan oleh user
        $val_data = $request->validate([
            // bisa diubah
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto'); // mengambil file yang diupload
            $fotoPath = $file->store('uploads', 'public');  // menyimpan file ke folder 'uploads' dan mengambil nama file yang unik
            $val_data['foto'] = $fotoPath;  // menambahkan path foto ke dalam data yang akan disimpan di database
        }

        // menyimpan data yang sudah divalidasi ke dalam database
        mahasiswa::create($val_data);

        return redirect('/');
    }

    // untuk mengembalikan halaman yg mau diupdate
    public function edit(mahasiswa $mahasiswa)
    {
        $fakultas = fakultas::all();
        return view('edit', ['mahasiswa' => $mahasiswa], ['fakultas' => $fakultas]);
    }

    // eksekusi update data
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $val_data = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // menghapus foto lama dari storage
            if ($mahasiswa->foto) {
                $fotoPathLama = storage_path('app/public/' . $mahasiswa->foto);
                if (file_exists($fotoPathLama)) {
                    unlink($fotoPathLama);  // menghapus foto lama
                }
            }

            // menyimpan foto baru
            $file = $request->file('foto');
            $fotoPath = $file->store('uploads', 'public');
            $val_data['foto'] = $fotoPath; 
        }

        // menyimpan data yang sudah divalidasi ke dalam database
        $mahasiswa->update($val_data);

        // redirect ke halaman utama
        return redirect('/');
    }

    // delete
    public function destroy(mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto) {
            $fotoPath = storage_path('app/public/' . $mahasiswa->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);  // menghapus foto dari storage
            }
        }

        // menghapus data yang dipilih berdasrkan id
        mahasiswa::destroy($mahasiswa->id);

        // redirect ke halaman utama
        return redirect('/');
    }
}
