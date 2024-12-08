<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bukus;

use Illuminate\Support\Facades\Storage;


class BukusController extends Controller
{
    public function index()
    {
        // Ambil semua data buku dari database
        $bukuses = bukus::all();

        // Kirim data ke view 'bukuses.index'
        return view('ListBuku.index', compact('bukuses'));
    }

    public function create()
    {
        return view('ListBuku.create');
    }

    public function store(Request $request)
    {
        $val_data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:10000',
            'penulis' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        // Simpan foto ke dalam st  orage
        $val_data['foto'] = $request->file('foto')->store('fotos', 'public');

        // Simpan data ke database
        Bukus::create($val_data);

        return redirect()->route('list-buku.index')->with('success', 'Buku Berhasil Ditambah');
    }
    public function edit(bukus $buku)
    {
        return view('ListBuku.edit', compact('buku'));
    }

    public function update(Request $request, bukus $buku)
    {
        // Validasi data
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'penulis' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:10000',
        ]);

        // Cek apakah ada file foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($buku->foto) {
                Storage::disk('public')->delete($buku->foto);
            }

            // Simpan foto baru
            $validatedData['foto'] = $request->file('foto')->store('fotos', 'public');
        } else {
            // Jika tidak ada foto baru, gunakan foto lama
            $validatedData['foto'] = $buku->foto;
        }

        // Update data buku
        $buku->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('list-buku.index')->with('success', 'Data Buku berhasil diperbarui!');
    }


    // public function update(Request $req, bukus $buku)
    // {
    //     $req->validate([
    //         'judul' => 'required',
    //         'deskripsi' => 'required',
    //         'penulis' => 'required',
    //         'stok' => 'required | integer',
    //         'harga' => 'required | integer',
    //         'foto' => 'required | image |mimes:jpg,png,jpeg|max:10000 ',
    //     ]);

    //     $path = $buku->foto;
    //     if ($req->hasFile('foto')) {
    //         if ($buku->foto) {
    //             Storage::disk('public')->delete($buku->foto);
    //         }
    //         $path = $req->file('foto')->store('bukuses', 'public');
    //     }

    //     $buku->update([
    //         'judul' => $req->judul,
    //         'deskripsi' => $req->deskripsi,
    //         'penulis' => $req->penulis,
    //         'stok' => $req->stok,
    //         'harga' => $req->harga,
    //         'foto' => $req->foto
    //     ]);

    //     return redirect()->route('ListBuku.index');
    // }

    public function destroy(bukus $buku)
    {
        $buku->delete();
        return redirect()->route('list-buku.index');
    }
}
