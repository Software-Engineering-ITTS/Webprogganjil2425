<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toko;

class TokoController extends Controller
{
    public function index() {
        $tokos = toko::latest()->get();

        return view('index', compact('toko'));
    }

    public function store(Request $request) {
        $val_data = $request->validate([
            "judul" => "required",
            "penulis" => "required",
            "harga" => "required",
            "deskripsi" => "required"
        ]);
        toko::create($val_data);

        return redirect('/')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(toko $toko) {
        return view('Update', [
            'data' => $toko
        ]);
    }

    public function update(Request $request, toko $toko) {
        $val_data = $request->validate([
            "judul" => "required",
            "penulis" => "required",
            "harga" => "required",
            "deskripsi" => "required"
        ]);

        $toko->update($val_data);
        return redirect('/')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy(toko $toko) {
        toko::destroy($toko->id);
        return redirect('/')->with('success', 'Buku berhasil dihapus');
    }
}