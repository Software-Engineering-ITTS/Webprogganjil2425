<?php

namespace App\Http\Controllers;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswas = Mahasiswa::all();
        return view('index', compact('mahasiswas'));
    }
    

    public function store(Request $request)
{
    $val_data = $request->validate([
        'nim' => 'required',
        'nama' => 'required',
        'prodi' => 'required',
        'alamat' => 'required',
        'id_fakultas' => 'required',
    ]);

    Mahasiswa::create($val_data);

    return redirect('/');
}

    public function edit($id){
        $mahasiswas = Mahasiswa::findOrFail($id);
        return view('edit', compact('mahasiswas'));
    }

    public function update(Request $request, $id){
        $val_data = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
        ]);
        $mahasiswas = Mahasiswa::findOrFail($id);
        $mahasiswas->update($val_data);

        return redirect('/' );
   
    }
    public function destroy($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect('/')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
