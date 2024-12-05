<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    //Index
    public function index(){
        
        $bukus = Buku::all();

        return view('bukus.index', compact('bukus'));
    }

    //create
    public function create(){

        $categories = Category::all(); 
        $authors = Author::all();

        return view('bukus.create', compact('categories', 'authors'));
    }

    //store
    public function store(Request $request){

        $val_data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:10000',
            'id_categories' => 'required|exists:categories,id',
            'id_authors' => 'required|exists:authors,id',
        ]);

            $fotoPath = $request->file('foto')->store('fotos', 'public');

            Buku::create($val_data);

            return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambah!');
    }

    //edit
    public function edit(Buku $buku){
        return view('bukus.edit', compact('buku'));
    }    

    //update
    public function update(Request $request, Buku $buku){

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:10000',
        ]);

        $path = $buku->foto;
        if ($request->hasFile('foto')) {
            if ($buku->foto) {
                Storage::disk('public')->delete($buku->foto); 
            }
            $path = $request->file('foto')->store('bukus', 'public'); 
        }

        $buku->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $path,
        ]);

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diperbarui!');
    }

    //destroy/hapus
    public function destroy(Buku $buku){

        $buku->delete();

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus!');
    }
}
