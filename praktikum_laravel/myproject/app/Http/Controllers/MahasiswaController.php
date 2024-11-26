<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        return view('alldata');
    }
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

    public function edit(){

    }

    public function update(Request $request){

    }

    public function destroy(Request $request){

    }
}
