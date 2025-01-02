<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengeluaran;
class PengeluaranController extends Controller
{
    public function index(){
        return view('pengeluaran');
    }
    public function store(Request $request){
        $val_data = $request->validate([
            'Nama_Barang' => 'required',
            'Jumlah_Barang' => 'required',
            'Nominal' => 'required',
            'Status' => 'required',
            'id_admin' => 'required'
            
        ]);
    
        pengeluaran::create($val_data);
    
        return redirect('/menu');
    }
    public function filter(Request $request)
{
    $bulan = $request->input('bulan');
    $tanggal = $request->input('tanggal');

    $pengeluaran = pengeluaran::when($bulan, function ($query) use ($bulan) {
        $query->whereMonth('created_at', $bulan);
    })->when($tanggal, function ($query) use ($tanggal) {
        $query->whereDay ('created_at', $tanggal);
    })->get();

    return view('lihatdata', compact('pengeluaran'));
}
}
