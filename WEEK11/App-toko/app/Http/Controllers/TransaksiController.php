<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\toko;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store(Request $request)
    {
        $val_data = $request->validate([
            "Nama" => "required",
            "NomorTelepon" => "required",
            "status" => "required",
            "toko_id" => "required"
        ]);
        Transaksi::create($val_data);

        return redirect('/');
    }
    public function edit($id)
    {
        $data = toko::where('id', $id)->get();
        if ($data->isEmpty()) {
            return redirect('/')->with('error', 'Data tidak ditemukan');
        }
        return view('beli', ['data' => $data]);
    }
    public function update(Request $request, Transaksi $transaksi)
    {
        $val_data = $request->validate([
            "Nama" => "required",
            "NomorTelepon" => "required",
            "status" => "required"
        ]);

        $transaksi->update($val_data);
        return redirect('/');
    }
    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->idTransaksi);
        return redirect('/');
    }
}
