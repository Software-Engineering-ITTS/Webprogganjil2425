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
    public function edit(){}
    public function update(Request $request){}
    public function destroy(Request $request){}

    public function show(Request $request){
        return redirect("/");
    }
}
