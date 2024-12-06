<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Buku;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        // Pass only the detailTransaksis to the view in the index method
        $detailTransaksis = DetailTransaksi::all();
        $transaksis = Transaksi::all();
        $bukus = Buku::all();
        return view('detailTransaksi', compact('detailTransaksis', 'transaksis', 'bukus'));
    }

    public function create()
    {
        // Pass transaksis and bukus when creating a new detail transaksi
        $transaksis = Transaksi::all();
        $bukus = Buku::all();
        return view('detailTransaksi', compact('transaksis', 'bukus')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_transaksi' => 'required|exists:transaksis,id',
            'id_buku' => 'required|exists:bukus,id',
            'jumlah_buku' => 'required|numeric',
            'harga_buku' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        DetailTransaksi::create($validated); // Save the new detail transaksi
        return redirect()->route('detailTransaksi.index')->with('success', 'Detail Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $detail_transaksis = DetailTransaksi::findOrFail($id);
        $transaksis = Transaksi::all();
        $bukus = Buku::all();
        return view('editDetailTransaksi', compact('detail_transaksis', 'transaksis', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_transaksi' => 'required|exists:transaksis,id',
            'id_buku' => 'required|exists:bukus,id',
            'jumlah_buku' => 'required|numeric',
            'harga_buku' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        $detail = DetailTransaksi::findOrFail($id);
        $detail->update($validated);

        return redirect()->route('detailTransaksi.index')->with('success', 'Detail Transaksi berhasil diubah');
    }

    public function destroy($id)
    {
        $detail = DetailTransaksi::findOrFail($id);
        $detail->delete();

        return redirect()->route('detailTransaksi.index')->with('success', 'Detail Transaksi berhasil dihapus');
    }
}
