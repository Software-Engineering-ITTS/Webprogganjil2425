<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class FormregistrasiController extends Controller
{
    public function formregis(){
        return view('formregistrasi');
    }
    public function regis(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:200',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:200',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $file = $request->file('foto');
        $fotopath=$file->store('foto_profile', 'public');
        $validatedData['foto'] = $fotopath;

        profile::create($validatedData);
        return redirect()->route('formregistrasi')->with('success', 'Registrasi Berhasil');
    }
}
