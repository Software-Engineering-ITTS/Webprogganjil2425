<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all(); // Memuat relasi kategori
        $bukus = Buku::all();

        return view('index', compact('bukus', 'kategoris'));
    }

    public function create()
    {
        $bukus = Buku::all(); // Mendapatkan data kategori
        return view('create', compact('bukus'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $valdata = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:1',
            'id_kategori' => 'required|exists:kategoris,id', // Validasi kategori harus valid
        ]);

        // Proses upload file
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('cover', $filename, 'public');
            $valdata['cover'] = $filePath; // Masukkan path file ke array $valdata
        } else {
            return back()->withErrors(['cover' => 'Cover buku wajib diunggah.']);
        }

        // Simpan data ke database
        Buku::create($valdata);

        // Redirect kembali dengan pesan sukses
        return redirect('/')->with('success', 'Buku berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();
        return view('editBuku', compact('buku', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $valdata = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:1',
            'id_kategori' => 'required|exists:kategoris,id', // Validasi kategori harus valid
        ]);

        // Proses upload file (jika ada)
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('cover', $filename, 'public');
            $valdata['cover'] = $filePath;
        }

        $buku->update($valdata);

        return redirect('/')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id){
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect('/')->with('success', 'Buku berhasil dihapus');
    }
}
