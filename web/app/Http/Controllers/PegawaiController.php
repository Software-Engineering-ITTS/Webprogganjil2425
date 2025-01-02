<?php

namespace App\Http\Controllers;
use App\Models\pegawai;
use App\Models\kesehatan;
use App\Http\Controllers\KesehatanController;
use Illuminate\Http\Request;


class PegawaiController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'namapegawai' => 'required',
        'password' => 'required',
    ]);

    $pegawai = pegawai::where('namapegawai', $request->namapegawai)->first();
    if($request->namapegawai == 'admin' && $request->password == 'admin'){
        $kesehatan = kesehatan::all();
        return view('/history',compact('kesehatan'));
    }
    else if ($pegawai && $pegawai->password == $request->password) {
        return redirect()->route('kesehatan', ['id' => $pegawai->id]);
    }else{
        return back();
    }
}

    public function store(Request $request)
{
    $val_data = $request->validate([
        'namapegawai' => 'required',
        'password' => 'required',
        'namalengkap' => 'required',
        'kelamin' => 'required',
        'alamat' => 'required',
        'penyakit' => 'required',
        'Goldarah' => 'required',
    ]);

    $pegawai = pegawai::create($val_data);

    return redirect()->route('riwayat', ['id' => $pegawai->id]);
}
}
