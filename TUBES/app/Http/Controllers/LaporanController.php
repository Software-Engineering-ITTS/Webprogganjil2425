<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;
use App\Models\pengeluaran;
use App\Http\Controllers\PengeluaranController;

class LaporanController extends Controller
{
public function index(){
    return view('welcome');
}
public function store(Request $request){
    $val_data = $request->validate([
        'Nama_Barang' => 'required',
        'Jumlah_Barang' => 'required',
        'Nominal' => 'required',
        'Status' => 'required',
        'id_admin' => 'required'
        
    ]);

    Laporan::create($val_data);

    return redirect('/menu');
}
public function filter(Request $request)
{
    $bulan = $request->input('bulan');
    $tanggal = $request->input('tanggal');

    $laporan = laporan::when($bulan, function ($query) use ($bulan) {
        $query->whereMonth('created_at', $bulan);
    })->when($tanggal, function ($query) use ($tanggal) {
        $query->whereDay ('created_at', $tanggal);
    })->get();
    $pengeluaran = pengeluaran::when($bulan, function ($query) use ($bulan) {
        $query->whereMonth('created_at', $bulan);
    })->when($tanggal, function ($query) use ($tanggal) {
        $query->whereDay ('created_at', $tanggal);      
    })->get();

    return view('lihatdata', compact('laporan', 'pengeluaran'));
}
}