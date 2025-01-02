<?php

namespace App\Http\Controllers;

use App\Models\IjinMasuk;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class IjinMasukController extends Controller {

    public function index()
    {
        $ijinMasuks = IjinMasuk::with(['user', 'ruangan'])->get();
        return view('ijinMasuks.index', compact('ijinMasuks'));
    }

    public function create()
    {
        $ruangans = Ruangan::all();
        return view('ijinMasuks.create', compact('ruangans'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'ruangan_id' => 'required|exists:ruangans,id',
            'alasan' => 'required|string',
            'waktu_ijin' => 'required|date',
        ]);


        IjinMasuk::create($request->all());
        return redirect()->route('ijinMasuks.index')->with('success', 'Ijin masuk berhasil diajukan.');
    }

    public function edit(IjinMasuk $ijinMasuk)
    {
        $ruangans = Ruangan::all();
        return view('ijinMasuks.edit', compact('ijinMasuk', 'ruangans'));
    }

    public function update(Request $request, IjinMasuk $ijinMasuk)
    {
        $request->validate([
            'alasan' => 'required|string',
            'waktu_ijin' => 'required|date',
            'status_verifikasi' => 'in:Pending,Disetujui,Ditolak',
        ]);

        $ijinMasuk->update($request->all());
        return redirect()->route('ijinMasuks.index')->with('success', 'Ijin masuk berhasil diperbarui.');
    }

    public function destroy(IjinMasuk $ijinMasuk)
    {
        $ijinMasuk->delete();
        return redirect()->route('ijinMasuks.index')->with('success', 'Ijin masuk berhasil dihapus.');
    }


    public function approval()
    {
        $ijinMasuks = IjinMasuk::where('status_verifikasi', 'pending')->get();
        return view('ijinMasuks.approval', compact('ijinMasuks'));
    }

    public function approve($id)
    {
        $ijinMasuk = IjinMasuk::findOrFail($id);
        $ijinMasuk->status_verifikasi = 'disetujui';
        $ijinMasuk->save();

        return redirect()->route('ijinMasuks.approval')->with('success', 'Ijin masuk berhasil disetujui.');
    }

    public function reject($id)
    {
        $ijinMasuk = IjinMasuk::findOrFail($id);
        $ijinMasuk->status_verifikasi = 'ditolak';
        $ijinMasuk->save();

        return redirect()->route('ijinMasuks.approval')->with('success', 'Ijin masuk berhasil ditolak.');
    }
}
