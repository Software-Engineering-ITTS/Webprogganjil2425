<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\profile;
use Illuminate\Http\Request;

class ViewregistrasiController extends Controller
{
    public function viewregistrasi(){
        $profiles = Profile::all();
        return view('viewregistrasi', compact('profiles'));
    }

    public function store(Request $request){
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
        //return redirect()->route('formregistrasi')->with('success', 'Registrasi Berhasil');
    

        return redirect()->route('viewregistrasi')->with('success', 'Data Berhasil Disimpan');
    }

}
