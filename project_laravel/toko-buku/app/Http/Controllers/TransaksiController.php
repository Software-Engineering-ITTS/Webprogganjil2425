<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function db()
    {
        $posts = DB::table('transaksis')
            ->join('books', 'transaksis.book_id', '=', 'books.id')
            ->select('transaksis.*', 'books.judul as judul', 'transaksis.nama as Nama', 'transaksis.telepon as NomorTelepon', 'transaksis.alamat as Alamat', 'transaksis.status as Status')
            ->get();

        return view('riwayat', ['data' => $posts]);
    }

    public function store(Request $request)
    {
        $val_data = $request->validate([
            "nama" => "required",
            "telepon" => "required",
            "alamat" => "required",
            "status" => "required",
            "book_id" => "required"
        ]);
        Transaksi::create($val_data);

        return redirect('/');
    }
    public function edit($id)
    {
        $data = book::where('id', $id)->get();
        if ($data->isEmpty()) {
            return redirect('/')->with('error', 'Data tidak ditemukan');
        }
        return view('beli', ['data' => $data]);
    }
    public function update(Request $request, Transaksi $transaksi)
    {
        $val_data = $request->validate([
            "nama" => "required",
            "telepon" => "required",
            "alamat" => "required",
            "status" => "required",
            "book_id" => "required"
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
