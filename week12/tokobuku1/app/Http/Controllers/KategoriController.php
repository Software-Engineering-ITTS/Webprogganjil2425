<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = Kategori::all();
        // Menggunakan view 'kategori.blade.php' untuk menampilkan daftar kategori
        return view('kategori', compact('kategoris'));
    }

    public function create(){
        // Masih menggunakan view 'kategori.blade.php' jika halaman ini juga diatur di sana
        return view('kategori');
    }

    public function store(Request $request)
    {
        $val_data = $request->validate([
            'nama_genre' => 'required',
            'deskripsi' => 'required',
        ]);
    
        Kategori::create($val_data);
    
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil ditambahkan');
    }

    public function edit($id){
        $kategoris = Kategori::findOrFail($id);
        // Menggunakan view 'kategori.blade.php' dengan data untuk edit
        return view('kategori', compact('kategoris'));
    }

    public function update(Request $request, $id){
        $val_data = $request->validate([
            'nama_genre' => 'required',
            'deskripsi' => 'required',
        ]);
        $kategoris = Kategori::findOrFail($id);
        $kategoris->update($val_data);

        return redirect()->route('kategori.index')->with('success', 'kategori berhasil di edit');
    }

    public function destroy($id){
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
