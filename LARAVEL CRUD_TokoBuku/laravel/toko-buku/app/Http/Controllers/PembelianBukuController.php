<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianBuku;
use App\Models\TokoBuku;

class PembelianBukuController extends Controller
{
    // Menyimpan pembelian buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'tanggal_membeli' => 'required|date',
            'ID_buku' => 'required|exists:toko_bukus,ID_buku',
        ]);

        $pembelian = PembelianBuku::create($validated);

        return response()->json([
            'message' => 'Pembelian buku berhasil',
            'data' => $pembelian,
        ], 201);
    }

    // Menampilkan semua pembelian buku
    public function index()
    {
        $pembelians = PembelianBuku::with('buku')->get(); // Menyertakan relasi 'buku'

        return response()->json([
            'message' => 'Daftar pembelian buku',
            'data' => $pembelians,
        ]);
    }

    // Menampilkan detail pembelian berdasarkan ID
    public function show($id)
    {
        $pembelian = PembelianBuku::with('buku')->find($id);

        if (!$pembelian) {
            return response()->json([
                'message' => 'Pembelian tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => 'Detail pembelian buku',
            'data' => $pembelian,
        ]);
    }

    // Memperbarui data pembelian
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pembeli' => 'sometimes|string|max:255',
            'tanggal_membeli' => 'sometimes|date',
            'ID_buku' => 'sometimes|exists:toko_bukus,ID_buku',
        ]);

        $pembelian = PembelianBuku::find($id);

        if (!$pembelian) {
            return response()->json([
                'message' => 'Pembelian tidak ditemukan',
            ], 404);
        }

        $pembelian->update($validated);

        return response()->json([
            'message' => 'Data pembelian berhasil diperbarui',
            'data' => $pembelian,
        ]);
    }

    // Menghapus pembelian
    public function destroy($id)
    {
        $pembelian = PembelianBuku::find($id);

        if (!$pembelian) {
            return response()->json([
                'message' => 'Pembelian tidak ditemukan',
            ], 404);
        }

        $pembelian->delete();

        return response()->json([
            'message' => 'Pembelian berhasil dihapus',
        ]);
    }
}

