<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\User;

class BarangController extends Controller
{
    public function index()
{
    $data = Barang::all();
    return view('home', ['data' => $data]);
}

public function login(Request $request)
{
    $request->validate([
        'name' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('name', $request->name)->first();

    if ($user && $user->password == $request->password) {
        return redirect('/home');
    }else{
        return back();
    }
}

    public function store(Request $request)
    {
        $val_data = $request->validate([
            "id_user" => 'required',
            "NamaBarang" => "required",
            "Stock" => "required",
        ]);
        Barang::create($val_data);
        return redirect('/home');
    }
    
    public function beli(Request $request, Barang $Barang)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        if ($Barang->Stock < $request->jumlah) {
            return redirect()->back()->withErrors(['Stok tidak cukup untuk pembelian ini.']);
        }

        $Barang->Stock -= $request->jumlah;
        $Barang->save();

        return redirect('/home')->with('success', 'Barang berhasil dibeli!');
    }

    public function tambah(Request $request, Barang $Barang)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $Barang->Stock += $request->jumlah;
        $Barang->save();

        return redirect('/home')->with('success', 'Barang berhasil ditambah!');
    }


    public function edit(Barang $Barang){
        return view('belibarang',[
        'data' => $Barang]);
    }
    
    public function editing(Barang $Barang){
        return view('restockbarang',[
        'data' => $Barang]);
    }
    

}
