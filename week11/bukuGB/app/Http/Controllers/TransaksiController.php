<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;  // Import model Transaksi
use App\Models\Bukus;      // Import model Bukus jika belum


class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input transaksi
        $request->validate([
            'buku_id' => 'required|exists:bukuses,id',      // Memastikan ID buku ada di tabel bukuses
            'jumlah_ordr' => 'required|integer|min:1',      // Validasi jumlah yang dipesan
            'hrg_satuan' => 'required|integer|min:1',       // Validasi harga satuan
            'pembeli' => 'required|string',                  // Validasi nama pembeli
        ]);

        // Ambil data buku berdasarkan ID
        $buku = Bukus::findOrFail($request->buku_id);

        // Pastikan stok cukup untuk transaksi
        if ($buku->stok < $request->jumlah_ordr) {
            return back()->with('error', 'Stok buku tidak cukup');
        }

        // Kurangi stok buku sesuai jumlah pesanan
        $buku->stok -= $request->jumlah_ordr;
        $buku->save();

        // Simpan data transaksi
        Transaksi::create([
            'buku_id' => $request->buku_id,
            'jumlah_ordr' => $request->jumlah_ordr,
            'hrg_satuan' => $request->hrg_satuan,
            'hrg_total' => $request->jumlah_ordr * $request->hrg_satuan,   // Menghitung harga total
            'pembeli' => $request->pembeli,
        ]);

        // Redirect ke halaman history transaksi dengan pesan sukses
        return redirect()->route('transaction.history')->with('success', 'Transaksi berhasil dilakukan');
    }

    public function create()
    {
        $bukuses = Bukus::all(); // Mengambil semua buku
        return view('Pembelian.index', compact('bukuses'));
    }

    public function index()
    {
        $transaksis = Transaksi::with('bukus')->get(); // Pastikan relasi sudah diatur di model
        return view('Riwayat.index', compact('transaksis'));
    }
}
