<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('TokoBuku.index', compact('buku'));
    }

    public function create()
    {
        return view('TokoBuku.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $valdata = $request->validate([
            'NAMA' => 'required',
            'TIPE' => 'required',
            'cover_buku' => 'required|file|mimes:jpeg,png,jpg|max:2048', // Validasi file
            'PENGARANG' => 'required',
            'PENERBIT' => 'required',
            'TAHUN' => 'required|numeric',
        ]);

        // Pastikan folder untuk menyimpan file ada
        $path = storage_path('app/public/cover');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Proses upload file
        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');

            // Buat nama file yang aman
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke disk 'public/cover'
            $filePath = $file->storeAs('cover', $filename, 'public');

            // Simpan path file ke database
            $valdata['cover_buku'] = $filePath;
        }

        // Simpan data buku ke database
        Buku::create($valdata);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('TokoBuku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $valdata = $request->validate([
            'NAMA' => 'required',
            'TIPE' => 'required',
            'cover_buku' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // File opsional
            'PENGARANG' => 'required',
            'PENERBIT' => 'required',
            'TAHUN' => 'required|numeric',
        ]);

        // Temukan data buku
        $buku = Buku::findOrFail($id);

        // Proses upload file jika ada
        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');

            // Hapus file lama jika ada
            if ($buku->cover_buku && Storage::exists('public/' . $buku->cover_buku)) {
                Storage::delete('public/' . $buku->cover_buku);
            }

            // Buat nama file yang aman
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke disk 'public/cover'
            $filePath = $file->storeAs('cover', $filename, 'public');

            // Simpan path file baru ke data buku
            $valdata['cover_buku'] = $filePath;
        }

        // Perbarui data buku di database
        $buku->update($valdata);

        return redirect()->back()->with('success', 'Buku berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('TokoBuku.index')->with('success', 'Buku berhasil dihapus!');
    }
    
}
