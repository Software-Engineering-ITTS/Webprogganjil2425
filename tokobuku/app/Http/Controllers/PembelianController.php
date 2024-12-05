<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    //
    public function index()
    {
        $bukus = Buku::all();
        return view('pembelian.index', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Logika penyimpanan pembelian
        // mengurangi stok buku:
        $buku = Buku::find($request->buku_id);
        if ($buku->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        $buku->stok -= $request->jumlah;
        $buku->save();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dilakukan!');
    }
}
