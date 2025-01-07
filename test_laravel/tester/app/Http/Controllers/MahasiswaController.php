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

    // store => add

    public function store(Request $request)
    {
        $val_data = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2000'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoPath = $file->store('upload', 'public');
            $val_data['foto'] = $fotoPath;
        }

        mahasiswa::create($val_data);
        return redirect('/');
    }

    public function edite(mahasiswa $mahasiswa)
    {
        $fakultas = fakultas::all();
        return view('edit', ['mahasiswa' => $mahasiswa], ['fakultas' => $fakultas]);
    }
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $val_data = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
            'foto' => 'nullable|image|mimes:jpg, jpeg, png| max: 2000'
        ]);

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto) {
                $fotoPathLm = storage_path('app/public/' . $mahasiswa->foto);
                if (file_exists($fotoPathLm)) {
                    unlink($fotoPathLm);
                }
            }

            $file = $request->file('foto');
            $fotoPath = $file->store('upload', 'public');
            $val_data['foto'] = $fotoPath;
        }
        $mahasiswa->update($val_data);
        return redirect('/');
    }

    public function destroy(mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto) {
            $fotoPath = storage_path('app/public/' . $mahasiswa->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        mahasiswa::destroy($mahasiswa->id);
        return redirect('/');
    }
}
