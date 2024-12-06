<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku; // Sesuaikan nama model dengan PascalCase

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $buku = Buku::all(); // Ambil semua data buku
        return view('buku', ['bukus' => $buku]);
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data buku ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/buku', 'public');
        }

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'sinopsis' => $request->sinopsis,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id); // Gunakan model Buku
        return view('buku', compact('buku'));
    }

    // Update data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buku = Buku::findOrFail($id);

        $fotoPath = $buku->foto;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/buku', 'public');
        }

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'sinopsis' => $request->sinopsis,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('buku')->with('success', 'Buku berhasil diupdate!');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        if ($buku->foto) {
            \Storage::disk('public')->delete($buku->foto);
        }
        $buku->delete();

        return redirect()->route('buku')->with('success', 'Buku berhasil dihapus!');
    }
}
