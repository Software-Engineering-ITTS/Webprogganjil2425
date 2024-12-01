<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswas = Mahasiswa::all();
        return view('alldata', compact('mahasiswas'));
    }
    public function store(Request $request){
        $val_data = $request->validate([
            'ktm' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
        ]);

        // if($request->hasFile('ktm')){
        //     $ktmPath = $request->file('ktm')->store('ktm', 'public');
        //     $val_data['ktm'] = $ktmPath;
        // }

        Mahasiswa::create($val_data);

        return redirect('/');
    }
    public function edit($id){
        $mahasiswas = Mahasiswa::find($id);
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

        $mahasiswas = Mahasiswa::find($id);
        $mahasiswas->update($val_data);

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
