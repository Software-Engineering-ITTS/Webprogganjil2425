<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanRisiko;
use App\Models\Penanggulangan;

class RisikoController extends Controller
{

    public function showForm()
{
    return view('laporan-risiko');
}

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'judul_risiko' => 'required|string|max:255',
            'kategori_risiko' => 'required|string',
            'tanggal_identifikasi' => 'required|date',
            'lokasi_risiko' => 'nullable|string|max:255',
            'deskripsi_risiko' => 'nullable|string',
            'kemungkinan' => 'required|string',
            'dampak' => 'required|string',

        ]);

        laporanRisiko::create($validatedData);

        return redirect()->back()->with('success', 'Laporan berhasil disimpan!');
    }

    public function showPenanggulanganForm()
    {
        $laporanRisiko = LaporanRisiko::all();
        return view('penanggulangan', compact('laporanRisiko'));
    }

    public function submitPenanggulanganForm(Request $request)
    {

        $validatedData = $request->validate([
            'id_risiko' => 'required|integer|exists:laporan_risiko,id',
            'penanggulangan' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'status' => 'required|string',
            'target_penyelesaian' => 'required|date',
        ]);

        Penanggulangan::create($validatedData);

        return redirect()->back()->with('success', 'Data penanggulangan berhasil disimpan.');
    }


    public function viewLaporan()
    {
        $laporanRisiko = LaporanRisiko::all();
        return view('viewlaporan', compact('laporanRisiko'));
    }


    public function viewPenanggulangan()
    {
        $penanggulangan = Penanggulangan::with('laporanRisiko')->get();
        return view('viewpenanggulangan', compact('penanggulangan'));
    }

    
    public function beriPenanggulangan($id)
    {
        $laporanRisiko = LaporanRisiko::findOrFail($id);
        return view('penanggulangan', compact('laporanRisiko'));
    }
}

