<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Pemeliharaan;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index()
    {
        $aset = Aset::all();
        $lokasi = Lokasi::all();
        return view('pemeliharaan', compact('aset', 'lokasi'));
    }

    public function viewPemeliharaan()
    {
        $pemeliharaan = Pemeliharaan::with(['aset', 'aset.lokasi'])->get();
        return view('/viewpemeliharaan', compact('pemeliharaan'));
    }

    public function create(Request $request)
    {
        $aset = Aset::all();
        $lokasi = Lokasi::all();
        $pemeliharaan = Pemeliharaan::with(['aset', 'lokasi'])->get();

        if ($request->has('aset_id')) {
            $aset_id = $request->input('aset_id');
            $lokasi = Lokasi::where('aset_id', $aset_id)->get();
        }

        return view('/viewpemeliharaan', compact('aset', 'lokasi', 'pemeliharaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'tanggal_pemeliharaan' => 'required|date',
            'jenis_pemeliharaan' => 'required|string',
            'deskripsi_masalah' => 'nullable|string',
            'tindakan' => 'nullable|string',
            'status' => 'required|in:Pending,Sedang Dipelihara,Selesai',
        ]);

        Pemeliharaan::create($request->all());

        return redirect()->route('viewpemeliharaan')->with('success', 'Pemeliharaan aset berhasil ditambahkan.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Sedang Dipelihara,Selesai',
        ]);

        $pemeliharaan = Pemeliharaan::findOrFail($id);
        $pemeliharaan->status = $request->status;
        $pemeliharaan->save();

        return redirect()->route('viewpemeliharaan')->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemeliharaan = Pemeliharaan::findOrFail($id);
        $pemeliharaan->delete();

        return redirect()->route('viewpemeliharaan')->with('success', 'Pemeliharaan berhasil dihapus');
    }
}
