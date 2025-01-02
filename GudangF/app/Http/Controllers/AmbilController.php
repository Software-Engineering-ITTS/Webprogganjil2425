<?php

namespace App\Http\Controllers;

use App\Models\Ambil;
use App\Models\Penambahan;
use Illuminate\Http\Request;

class AmbilController extends Controller
{
  
    public function ambilForm(Penambahan $penambahan)
    {
        return view('ambilbarang', compact('penambahan'));
    }

    
    public function ambilPost(Request $request, Penambahan $penambahan)
    {
       
        $validatedData = $request->validate([
            'email' => 'required|exists:users,email',
            'name' =>'required',
            'AMbarang' => 'required',
            'JUMbar' => 'required',
            'BERbar' => 'required',
            'Dateam' => 'required',
        ], [
            'email.exists' => 'email yang Anda masukkan tidak valid.',
            'email.required'=>'email wajib diisi.',
            'name.required' => 'Nama wajib diisi.',
            'AMbarang.required' => '',
            'JUMbar.required' => '',
            'BERbar.required' => '',
            'Dateam.required' => 'Tanggal pengambilan barang wajib diisi.',
        ]);

     
        $penambahan->update([
            'StatusBar' => 'diambil',
        ]);

        Ambil::create([
            'email'=>$validatedData['email'],
            'name' => $validatedData['name'],
            'AMbarang' => $validatedData['AMbarang'],
            'JUMbar' => $validatedData['JUMbar'],
            'BERbar' => $validatedData['BERbar'],
            'Dateam' => $validatedData['Dateam'],
        ]);

       
        return redirect()->route('lihat')->with('success', 'Barang berhasil diambil!');
    }
}
