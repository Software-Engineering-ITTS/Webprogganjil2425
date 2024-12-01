<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('index', ['mahasiswas' => $mahasiswas]);
    }
    public function store(Request $request)
    {
        $val_data = $request->validate([
            'NIM' => 'required',
            'NAMA' => 'required',
            'PRODI' => 'required',
            'ALAMAT' => 'required',
            'id_fakultas' => 'required',
        ]);

        mahasiswa::create($val_data);

        return redirect('/');
    }

    public function edit($id){
        $mahasiswas = Mahasiswa::find($id);
        return view('edit', compact('mahasiswas'));
    }

    public function update(Request $request, $id){
        $val_data = $request->validate([
            'NIM' => 'required',
            'NAMA' => 'required',
            'PRODI' => 'required',
            'ALAMAT' => 'required',
            'id_fakultas' => 'required',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($val_data);

        return redirect('/');
    }

    public function destroy(Request $request){
        $id = $request->input('id');

        $mahasiswa = Mahasiswa::find($id);
        
        $mahasiswa->delete();

        return redirect('/');   
    }

    public function show(Request $request){
        return redirect("/");
    }
}
