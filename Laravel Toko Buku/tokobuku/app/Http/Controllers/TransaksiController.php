<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\customer;
use App\Models\transaksi;
use App\Models\detail_transaksi;

class TransaksiController extends Controller
{
    public function checkout()
    {
        if (!session()->has('customer_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }
        
        // ambil keranjang dari session
        $keranjang = session('keranjang', []);

        if (empty($keranjang)) {
            return redirect('/customer/keranjang')->with('error', 'Keranjang kosong! Silakan tambahkan item terlebih dahulu.');
        }

        // hitung total harga
        $totalHarga = 0;
        foreach ($keranjang as $item) {
            $totalHarga += $item['harga'] * $item['qty'];
        }

        // ambil id customer dari session
        $id_customer = session('customer')->id ?? null;

        if (!$id_customer) {
            return redirect('/customer/login')->with('error', 'Anda harus login untuk melanjutkan checkout.');
        }

        // simpan transaksi
        $transaksi = transaksi::create([
            'tanggal' => now(),
            'total' => $totalHarga,
            'id_customer' => $id_customer,
        ]);

        // simpan detail transaksi
        foreach ($keranjang as $item) {
            detail_transaksi::create([
                'qty' => $item['qty'],
                'harga' => $item['harga'],
                'id_buku' => $item['id'],
                'id_transaksi' => $transaksi->id, // id transaksi yang baru dibuat
            ]);

            // kurangi stok buku
            $buku = buku::find($item['id']); // ambil buku berdasarkan ID
            if ($buku) {
                // pastikan stok cukup, jika cukup kurangi stok
                if ($buku->stok >= $item['qty']) {
                    $buku->stok -= $item['qty']; // kurangi stok
                    $buku->save(); // simpan perubahan stok ke database
                } else {
                    // jika stok tidak cukup, kembalikan error
                    return redirect('/customer/keranjang')->with('error', 'Stok buku ' . $buku->judul . ' tidak mencukupi.');
                }
            }
        }

        // hapus keranjang dari session setelah transaksi selesai
        session()->forget('keranjang');

        // redirect ke halaman konfirmasi atau sukses
        return redirect('/customer/histori')->with('success', 'Checkout berhasil! Transaksi Anda telah diproses.');
    }

    public function showhistori()
    {
        if (!session()->has('customer_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $id_customer = session('customer')->id ?? null;
        if (!$id_customer) {
            return redirect('/customer/login')->with('error', 'Anda harus login untuk melihat histori transaksi.');
        }

        // ambil transaksi yang sesuai dengan ID customer yang login
        $transaksis = transaksi::where('id_customer', $id_customer)->get();

        // ambil detail transaksi yang terkait dengan transaksi yang sesuai
        $detail_transaksis = detail_transaksi::whereIn('id_transaksi', $transaksis->pluck('id'))->get();

        // ambil data buku yang terkait dengan detail transaksi
        $bukus = buku::whereIn('id', $detail_transaksis->pluck('id_buku'))->get();

        return view('histori', [
            'transaksis' => $transaksis,
            'detail_transaksis' => $detail_transaksis,
            'bukus' => $bukus
        ]);
    }

    public function showhistoris()
    {
        if (!session()->has('admin_id')) {
            return redirect('/login')->with('error', 'You must be logged in as admin to access this page.');
        }

        // ambil semua transaksi
        $transaksis = transaksi::all();

        // ambil data cuatomer yang terkait dengan transaksi
        $customers = customer::whereIn('id', $transaksis->pluck('id_customer'))->get();

        // ambil detail transaksi yang terkait dengan transaksi yang ada
        $detail_transaksis = detail_transaksi::whereIn('id_transaksi', $transaksis->pluck('id'))->get();

        // ambil data buku yang terkait dengan detail transaksi
        $bukus = buku::whereIn('id', $detail_transaksis->pluck('id_buku'))->get();

        // tampilkan semua transaksi beserta detailnya untuk admin
        return view('historis', [
            'transaksis' => $transaksis,
            'detail_transaksis' => $detail_transaksis,
            'bukus' => $bukus,
            'customers' => $customers,
        ]);
    }
}
