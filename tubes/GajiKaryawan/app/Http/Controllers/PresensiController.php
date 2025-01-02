<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        $presensis = Presensi::with('karyawan')->get();
        return view('presensi', compact('karyawans', 'presensis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|in:Hadir,Alpha,Sakit',
        ]);

        Presensi::create($validatedData);

        return redirect()->route('presensi.index');
    }

    public function edit($id)
    {
        $presensi = Presensi::findOrFail($id);
        $karyawans = Karyawan::all();
        return view('presensi.edit', compact('presensi', 'karyawans'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|in:Hadir,Alpha,Sakit',
        ]);

        $presensi = Presensi::findOrFail($id);
        $presensi->update($validatedData);

        return redirect()->route('presensi.index');
    }

    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();

        return redirect()->route('presensi.index');
    }
}
