<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $alldata = Mahasiswa::all();
        return view('alldata', ['mahasiswas' => $alldata]);
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
    public function edit() {}
    public function update(Request $request) {}
    public function destroy(Request $request) {}
}
