<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RisikoController extends Controller
{
    public function showForm()
    {
        return view('laporan-risiko');
    }


    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'namaPelapor' => 'required|string|max:255',
            'judulRisiko' => 'required|string|max:255',
            'kategoriRisiko' => 'required|string',
            'tanggalIdentifikasi' => 'required|date',
            'deskripsiRisiko' => 'required|string',
        ]);


        return redirect()->route('strategi.form');
    }

    public function showStrategiForm()
    {
        return view('penanggulangan');
    }

    public function submitStrategiForm(Request $request)
    {

        $validated = $request->validate([
            'deskripsiPenanggulangan' => 'required|string',
            'penanggungJawab' => 'required|string',
            'statusPenanggulangan' => 'required|string',
            'targetPenyelesaian' => 'required|date',
        ]);

        return redirect()->route('form')->with('success', 'Laporan lengkap berhasil disimpan!');
    }
}

