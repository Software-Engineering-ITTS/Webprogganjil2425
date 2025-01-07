<?php

namespace App\Http\Controllers;
use App\Models\buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function buatbuku(){
        $buku = buku::all();
        return view('buatbuku');
    }
    public function belibuku(Request $request){
        $validated = $request->validate([
            'judul' => 'required',
            'pencipta' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);
        $path=$request->file('img')->store('public/asset');

        buku::create([
            'judul' => $validated['judul'],
            'pencipta' => $validated['pencipta'],
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'img' => $path,

        ]);


    }
    public function edit($id){
        $buku = buku::findOrFail($id);
        return view('updatebuku');
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'judul' => 'required',
            'pencipta' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'img' => 'image|mimes:jpg, jpeg, png, webp|max:2048',
        ]);
        $buku = buku::findOrFail($id);

        if($request->hasFile('img')){
            $path = $request->file('img')->store('public/asset');
            $buku->img = $path;
        }
        $buku->update($validated);
        return redirect()->route('updatebuku')->with('success', 'buku berhasil diperbarui');
    }
    public function hapus($id){
        $buku = buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('hapusbuku')->with('success', 'buku berhasil dihapus');
    }

}
