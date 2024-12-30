<?php

namespace App\Http\Controllers;

use App\Models\StatusBarang;
use App\Models\Barang;
use Illuminate\Http\Request;

class StatusBarangController extends Controller

{
    public function index() {
        $status = StatusBarang::all();
        return view('admin.dashboard', compact(var_name: 'status'));

    }
    public function create()
    {
        $barangs = Barang::all();
        return view('admin.statusbarang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'status' => 'required|in:dikirim,diterima,dalam_pengiriman',
        ]);

        StatusBarang::create($validated);

        return redirect()->route('statusbarang.store')->with('success', 'Status berhasil diperbarui!');
    }
}
