<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Aset;

class LokasiController extends Controller
{

    public function index()
    {
        $lokasi = Lokasi::with('aset')->get();
        $data=Aset::all();
        return view('lokasi', compact( 'data'));
    }


    public function view()
    {
        $lokasi = Lokasi::with('aset')->get();
        return view('lihatlokasi', compact('lokasi'));
    }

    public function create()
    {
        $data = Aset::all();
        return view('lokasi', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'nama_lokasi' => 'required',
            'kode_lokasi' => 'required',
            'jenis_lokasi' => 'required',
            'catatan' => 'nullable',
        ]);

        Lokasi::create($request->all());

        return redirect()->route('lihatlokasi')->with('success', 'Data lokasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $aset = Aset::all();
        return view('lokasi.edit', compact('lokasi', 'aset'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'lokasi' => 'required',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->all());

        return redirect()->route('lokasi.index')->with('success', 'Data lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect('/lihatlokasi')->with('success', 'Data lokasi berhasil dihapus.');
    }
}
