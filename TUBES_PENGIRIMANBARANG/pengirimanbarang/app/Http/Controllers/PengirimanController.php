<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Barang;
use App\Models\StatusBarang;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengirimans = Pengiriman::with('barang')->get();
        $statuses = StatusBarang::pluck('status');
        return view('admin.dashboard', compact('pengirimans', 'statuses'));
    }
    

    public function create()
    {
        $barangs = Barang::all();
        return view('admin.pengiriman', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'alamat_tujuan' => 'required|string|max:255',
            'kurir' => 'required|string|max:255',
            'tanggal_pengiriman' => 'required|date',
        ]);

        Pengiriman::create([
            'barang_id' => $request->barang_id,
            'alamat_tujuan' => $request->alamat_tujuan,
            'kurir' => $request->kurir,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
            'status' => 'pending',
        ]);

        return redirect()->route('pengiriman.store')->with('success', 'Pengiriman berhasil ditambahkan');
    }
}
