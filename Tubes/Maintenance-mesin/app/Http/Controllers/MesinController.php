<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    function tampil(){
        $mesin = Mesin::get();
        return view('mesin.tampil', compact('mesin'));
    }

    function tambah(){
        return view('mesin.tambah');
    }

    function submit(Request $request) {
        $mesin = new Mesin();
        $mesin-> no_mesin = $request->no_mesin;
        $mesin-> nama_mesin = $request->nama_mesin;
        $mesin-> sparepart_mesin = $request->sparepart_mesin;
        $mesin-> fungsi_mesin = $request->fungsi_mesin;
        $mesin-> deskripsi = $request->deskripsi;
        $mesin->save();

        return redirect()->route('mesin.tampil');
    }

    function edit($id){
        $mesin = Mesin::find($id);
        return view('mesin.edit', compact('mesin'));
    }

    function update(Request $request, $id){
        $mesin = Mesin::find($id);
        $mesin-> no_mesin = $request->no_mesin;
        $mesin-> nama_mesin = $request->nama_mesin;
        $mesin-> sparepart_mesin = $request->sparepart_mesin;
        $mesin-> fungsi_mesin = $request->fungsi_mesin;
        $mesin-> deskripsi = $request->deskripsi;
        $mesin->update();

        return redirect()->route('mesin.tampil');
    }

    function delete($id){
        $mesin = Mesin::find($id);
        $mesin->delete();

        return redirect()->route('mesin.tampil');
    }
}
