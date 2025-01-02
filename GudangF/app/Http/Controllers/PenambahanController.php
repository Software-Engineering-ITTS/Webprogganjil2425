<?php

namespace App\Http\Controllers;

use App\Models\Penambahan;
use Illuminate\Http\Request;

class PenambahanController extends Controller
{
  
    public function penambahan()
    {
        return view("tambahbarang");
    }

    public function penambahanPost(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'exists:users,email',
            ],
            "name"=>"required",
            "NamaBar" => "required",
            "JumlahBar" => "required",
            "BeratBar" => "required",
            "DateBar" => "required",
        ], [
            'email.exists' => 'email yang Anda masukkan tidak valid.',
            "email.required"=>'email wajib diisi',
            'name.required' => 'Nama wajib diisi.',
            'NamaBar.required' => 'Nama barang wajib diisi.',
            'JumlahBar.required' => 'Jumlah barang wajib diisi.',
            'BeratBar.required' => 'Berat barang wajib diisi.',
            'DateBar.required' => 'Tanggal penambahan barang wajib diisi.',
        ]);

        $penambahans = Penambahan::create([
            "email"=>$request->email,
            "name" => $request->name,
            "NamaBar" => $request->NamaBar,
            "JumlahBar" => $request->JumlahBar,
            "BeratBar" => $request->BeratBar,
            "DateBar" => $request->DateBar,
            "StatusBar" => 'di gudang',
        ]);

        return redirect(route("lihat"))->with("success", "Barang berhasil ditambahkan!");
    }

    public function lihatbarang()
    {
        $penambahans = Penambahan::all();
        return view('lihatbarang', compact('penambahans'));
    }

    public function edit(Penambahan $penambahan)
    {
        return view('editbarang', compact('penambahan'));
    }

   
    public function update(Request $request, Penambahan $penambahan)
    {
        $request->validate([
            
            "NamaBar" => "required",
            "JumlahBar" => "required",
            "BeratBar" => "required",
            "DateBar" => "required",
            "StatusBar" =>"required",
        ]);

        $penambahan->update($request->only([
            "name", "NamaBar", "JumlahBar", "BeratBar", "DateBar","StatusBar"
        ]));

        return redirect()->route('lihat')->with('success', 'Barang berhasil diperbarui!');
    }

 
    public function aturbarang()
    {
        $penambahans = Penambahan::all();
        return view('aturbarang', compact('penambahans'));
    }


    public function destroy(Penambahan $penambahan)
    {
        $penambahan->delete();
        return redirect()->route('lihat')->with('success', 'Barang berhasil dihapus!');
    }
}
