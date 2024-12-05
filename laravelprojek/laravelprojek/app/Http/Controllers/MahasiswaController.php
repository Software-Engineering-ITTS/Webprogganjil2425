<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function store(Request $request){
        $val_data = $request->validate([
            'NIM' => 'required',
            'NAMA' => 'required',
            'PRODI' => 'required',
            'ALAMAT' => 'required',
            'id_fakultas' => 'required',
        ]);

        Mahasiswa::create($val_data);

        return redirect('/');
    }

    public function edit(Mahasiswa $mahasiswa){
        return view('edit', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa){
        $val_data = $request->validate([
            'NIM' => 'required',
            'NAMA' => 'required',
            'PRODI' => 'required',
            'ALAMAT' => 'required',
            'id_fakultas' => 'required',
        ]);

        $mahasiswa->update($val_data);

        return redirect('/');
    }

    public function destroy(Mahasiswa $mahasiswa){

        Mahasiswa::destroy($mahasiswa->id);

        return redirect('/');
    }
}
