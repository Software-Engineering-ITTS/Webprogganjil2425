<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\toko;

class TransaksiController extends Controller
{
    public function index() {
        return view('index');
    }

    public function db() {

        $posts = DB::table('transaksis')
            ->join('tokos', 'transaksis.toko_id', '=', 'tokos.id')
            ->select(
                'transaksis.*', 
                'tokos.judul as judul', 
                'transaksis.Nama as Nama',
                'transaksis.telepon as NomorTelepon', 
                'transaksis.Alamat as Alamat', 
                'transaksis.Status as Status' 
                )
            ->get();
    
        return view('history', ['data' => $posts]);
    }
    
    public function store(Request $request) {

        $val_data = $request->validate([
            "nama" => "required",
            "telepon" => "required",
            "alamat" => "required",
            "status" => "required",
            "toko_id" => "required"
        ]);
        Transaksi::create($val_data);

        return redirect('/')->with('success', 'Pembelian Berhasil');
    }

    public function edit($id) {

        $data = toko::where('id', $id)->get();
        if ($data->isEmpty()) {
            return redirect('/')->with('error', 'Data tidak ditemukan');
        }
        return view('customer', ['data' => $data]);
    }

    public function update(Request $request, Transaksi $transaksi) {

        $val_data = $request->validate([
            "nama" => "required",
            "telepon" => "required",
            "alamat" => "required",
            "status" => "required"
        ]);

        $transaksi->update($val_data);
        return redirect('/');
    }

    public function destroy(Transaksi $transaksi) {

        Transaksi::destroy($transaksi->idTransaksi);
        return redirect('/');
    }
}