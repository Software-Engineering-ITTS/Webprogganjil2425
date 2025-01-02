<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class ViewregistrasiController extends Controller
{
    public function viewregistrasi(){
        $profiles = Profile::all();
        return view('viewregistrasi', compact('profiles'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:profiles',
            'telepon' => 'required|numeric',
            'alamat' => 'required|string|max:200',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $request->file('foto') ? $request->file('foto')->store('foto_profile', 'public') : null;

        Profile::create([
        'nama' => $request->nama,
        'email' => $request-> email,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'foto' => $path,

        ]);

        return redirect()->route('viewregistrasi')->with('success', 'Data Berhasil Disimpan');
    }

}
