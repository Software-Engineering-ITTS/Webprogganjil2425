<?php

namespace App\Http\Controllers;

use App\Models\TokoBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokoBukuController extends Controller
{
    public function index()
    {
        // Ambil semua data buku dari database
        $buku = TokoBuku::all();

        // Kirim data ke view
        return view('index', compact('buku'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $data = $request->validate([
            'nama_buku' => 'required|string|max:255',
            'status_buku' => 'required|boolean',
            'kuantitas_buku' => 'required|integer',
            'tanggal_terbit_buku' => 'required|date',
            'file_gambar' => 'nullable|image',
            'harga_buku' => 'required|integer',
        ]);

        // Handle file upload
        if ($request->hasFile('file_gambar')) {
            $path = $request->file('file_gambar')->store('uploads', 'public');
            $data['file_gambar'] = $path;
        } else {
            $data['file_gambar'] = 'default.png'; // Nilai default jika tidak ada file yang diunggah
        }

        // Simpan data buku baru
        TokoBuku::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('toko-buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show($nama_buku)
{
    // Cari buku berdasarkan nama_buku
    $buku = TokoBuku::where('nama_buku', $nama_buku)->firstOrFail();

    // Kirim data ke view
    return view('update', compact('buku'));
}


public function update(Request $request, $id)
{
    // Validasi input
    $data = $request->validate([
        'nama_buku' => 'required|string|max:255',
        'status_buku' => 'required|boolean',
        'kuantitas_buku' => 'required|integer',
        'tanggal_terbit_buku' => 'required|date',
        'file_gambar' => 'nullable|image',
        'harga_buku' => 'required|integer',
    ]);

    // Temukan buku berdasarkan ID
    $buku = TokoBuku::findOrFail($id);

    // Handle file upload jika ada gambar baru
    if ($request->hasFile('file_gambar')) {
        // Hapus gambar lama jika ada
        if ($buku->file_gambar && $buku->file_gambar !== 'default.png') {
            Storage::delete('public/' . $buku->file_gambar);
        }

        // Upload gambar baru
        $path = $request->file('file_gambar')->store('uploads', 'public');
        $data['file_gambar'] = $path;
    } else {
        $data['file_gambar'] = $buku->file_gambar; // Tetap gunakan gambar lama jika tidak ada yang diunggah
    }

    // Update data buku
    $buku->update($data);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('toko-buku.index')->with('success', 'Buku berhasil diupdate');
}


public function destroy($id)
{
    // Temukan buku berdasarkan ID
    $buku = TokoBuku::findOrFail($id);

    // Hapus gambar jika ada (kecuali gambar default)
    if ($buku->file_gambar && $buku->file_gambar !== 'default.png') {
        Storage::delete('public/' . $buku->file_gambar);
    }

    // Hapus buku dari database
    $buku->delete();

    // Redirect ke halaman daftar buku dengan pesan sukses
    return redirect()->route('toko-buku.index')->with('success', 'Buku berhasil dihapus');
}

}
