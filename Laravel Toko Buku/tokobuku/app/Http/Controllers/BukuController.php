<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function show()
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $buku = buku::all();
        return view('daftarbuku', ['bukus' => $buku]);
    }

    public function create()
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        return view('tambahbuku');
    }

    public function store(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        // memvalidasi data yang dikirmkan oleh user
        $val_data = $request->validate([
            // bisa diubah
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('foto'); // mengambil file yang diupload
        $fotoPath = $file->store('uploads', 'public');  // menyimpan file ke folder 'uploads' dan mengambil nama file yang unik
        $val_data['foto'] = $fotoPath;  // menambahkan path foto ke dalam data yang akan disimpan di database

        // menyimpan data yang sudah divalidasi ke dalam database
        buku::create($val_data);

        return redirect('/admin/daftarbuku');
    }

    public function edit(buku $buku)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        return view('editbuku', ['buku' => $buku]);
    }

    public function update(Request $request, buku $buku)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $val_data = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($buku->foto) {
            $fotoPathLama = storage_path('app/public/' . $buku->foto);
            if (file_exists($fotoPathLama)) {
                unlink($fotoPathLama);  // menghapus foto lama
            }
        }
        // menyimpan foto baru
        $file = $request->file('foto');
        $fotoPath = $file->store('uploads', 'public');
        $val_data['foto'] = $fotoPath;


        // menyimpan data yang sudah divalidasi ke dalam database
        $buku->update($val_data);

        // redirect ke halaman utama
        return redirect('/admin/daftarbuku');
    }

    public function destroy(buku $buku)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        if ($buku->foto) {
            $fotoPath = storage_path('app/public/' . $buku->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);  // menghapus foto dari storage
            }
        }

        // menghapus data yang dipilih berdasrkan id
        buku::destroy($buku->id);

        // redirect ke halaman utama
        return redirect('/admin/daftarbuku');
    }

    public function showbeli()
    {
        if (!session()->has('customer_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $buku = buku::all();
        return view('belibuku', ['bukus' => $buku]);
    }

    public function konfirmbeli(buku $buku)
    {
        if (!session()->has('customer_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        return view('konfirmbeli', ['buku' => $buku]);
    }
}
