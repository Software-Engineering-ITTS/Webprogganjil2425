<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function showkeranjang()
    {
        if (!session()->has('customer_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        // ambil keranjang dari session
        $keranjang = session('keranjang', []);

        // hitung total harga
        $total = 0;
        foreach ($keranjang as $item) {
            $total += $item['harga'] * $item['qty']; // Harga * Quantity untuk setiap item
        }

        // tampilkan keranjang dan total harga
        return view('keranjang', ['keranjang' => $keranjang, 'total' => $total]);
    }

    public function addtocart(Request $request)
    {
        if (!session()->has('customer_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        // ambil data dari form
        $id = $request->input('buku_id');
        $foto = $request->input('foto');
        $judul = $request->input('judul');
        $harga = $request->input('harga');
        $qty = $request->input('qty');

        if ($qty < 1) {
            return redirect()->back()->with('error', 'Jumlah tidak boleh kurang dari 1!');
        }

        $keranjang = session('keranjang', []); // ambil data keranjang dari session atau buat array kosong jika belum ada

        // menambahkan buku baru ke dalam keranjang
        $keranjang[] = [
            'id' => $id,
            'foto' => $foto,
            'judul' => $judul,
            'harga' => $harga,
            'qty' => $qty,
        ];

        $total = 0;
        foreach ($keranjang as $item) {
            $total += $item['harga'] * $item['qty']; // Harga * Quantity untuk setiap item
        }

        // simpan kembali data ke session atau kirim data langsung ke view
        session(['keranjang' => $keranjang]);

        // return view('keranjang', ['keranjang' => $keranjang]);
        return view('keranjang', ['keranjang' => $keranjang, 'total' => $total]);
    }

    public function hapuskeranjang($index)
    {
        if (!session()->has('customer_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }
        
        // ambil keranjang dari session
        $keranjang = session('keranjang', []);

        // hapus item berdasarkan index
        unset($keranjang[$index]);

        // reindex array agar tidak ada indeks yang hilang
        $keranjang = array_values($keranjang);

        // simpan kembali keranjang yang sudah diperbarui ke session
        session(['keranjang' => $keranjang]);

        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect('/customer/keranjang')->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}
