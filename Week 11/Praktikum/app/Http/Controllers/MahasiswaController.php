<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index(){
        $fakultas = Fakultas::all();
        $mahasiswas = Mahasiswa::all();
        $mahasiswas = Mahasiswa::with('fakultas')->get();
        return view('index', ['mahasiswas' => $mahasiswas], ['fakultas' => $fakultas]);

    }

    public function show($id)
    {

        $mahasiswa = Mahasiswa::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('mahasiswa.show', compact('mahasiswa', 'fakultas'));
    }

    public function store(Request $request){
        $val_data = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
        ]);


        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->store('uploads', 'public');
            $val_data['foto'] = $filePath;
        }

        Mahasiswa::create($val_data);

        return redirect('/')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('edit', compact('mahasiswa', 'fakultas'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'id_fakultas' => 'required',
            'alamat' => 'nullable',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto && Storage::exists('public/' . $mahasiswa->foto)) {
                Storage::delete('public/' . $mahasiswa->foto);
            }

            $validatedData['foto'] = $request->file('foto')->store('foto-mahasiswa', 'public');
        }

        $mahasiswa->update($validatedData);

        return redirect('/')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    //Delete
    public function destroy(Request $request)
{
    $id = $request->input('id');
    $mahasiswa = Mahasiswa::findOrFail($id);

    if ($mahasiswa->foto && Storage::exists('public/' . $mahasiswa->foto)) {
        Storage::delete('public/' . $mahasiswa->foto);
    }

    $mahasiswa->delete();
    return redirect('/')->with('success', 'Data mahasiswa berhasil dihapus');
}

}
