<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index () {

        $dataBuku = Buku::all();
        return view('components.databuku', ['dataBuku' => $dataBuku]);
    }

    public function store (Request $request) {

        $val_data = $request->validate([
            "cover" => "required",
            "judul" => "required",
            "penulis" => "required",
            "kategori" => "required",
            "harga" => "required",
            "deskripsi" => "required",
        ]);

        $cover = $request->file('cover');
        $cover->store('public/storage', $cover->hashName());

        buku::create($val_data);

        // $buku = new Buku();

        // $buku->cover = $request->cover;
        // $buku->judul = $request->judul;
        // $buku->penulis = $request->penulis;
        // $buku->kategori = $request->kategori;
        // $buku->harga = $request->harga;
        // $buku->deskripsi = $request->deskripsi;

        // $buku->save();
        
        return redirect()->route('index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function destroy (Buku $buku) {
    
        $buku->delete();
    
        return redirect()->route('index')->with('success', 'Buku berhasil dihapus');
    }
}
