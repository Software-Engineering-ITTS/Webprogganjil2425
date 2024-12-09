<?php

namespace App\Http\Controllers;

use App\Models\Bookss;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Menampilkan daftar buku.
     */
    public function index()
    {
        $bookss = Bookss::all();
        return view('index', compact('bookss'));
    }

    public function pembelian($id)
    {
        $bookss = Bookss::findOrFail($id);
        return view('pembelian', compact('bookss'));
    }

    public function beli(Request $request, $id)
    {
        $bookss = Bookss::findOrFail($id);
         $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);
        if ($request->jumlah > $bookss->Stock) {
            return redirect()->back()
                ->with('error', 'Gagal membeli! Jumlah melebihi stok tersedia.');
        }

        // Kurangi stok buku
        $bookss->Stock -= $request->jumlah;
        $bookss->save();

        return redirect()->route('bookss.index')
            ->with('success', 'Pembelian berhasil! Stok buku telah diperbarui.');
    }
}
