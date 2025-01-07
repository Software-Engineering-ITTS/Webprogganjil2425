<?php

namespace App\Http\Controllers;

use App\Models\formkonsultasi;
use Illuminate\Http\Request;
use App\Models\pasien;
use App\Models\schedule;

class ViewdataController extends Controller
{
  public function viewdataform(){
    $pasiens = pasien::all();
    $schedule = schedule::all();
    $formkonsultasi = formkonsultasi::all();
    return view('viewdata', compact('pasiens' ,'schedule', 'formkonsultasi'));
  }

  public function store(Request $request){
    $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tempat_kelahiran' => 'required|string',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'umur' => 'required|integer',
            'keluhan' => 'required|string',
            'kondisi' => 'required|in:Baik,Sedang Sakit,Kritis',
            'antrian' => 'required|in:Normal,Slight Emergency,Emergency',
            'konsultasi' => 'nullable|boolean',
            'schedule_id' => 'required|exists:schedules,id'
    ]);
    dd($validated);
    pasien::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tempat_kelahiran' => $request->tempat_kelahiran,
        'gender' => $request->gender,
        'umur' => $request->umur,
        'keluhan' => $request->keluhan,
        'kondisi' => $request->kondisi,
        'antrian' => $request->antrian,
        'konsultasi' => $request->konsultasi,
        'schedule_id' => $request->schedule_id,

        // 'nama' => $validated['nama'],
        //     'alamat' => $validated['alamat'],
        //     'tempat_kelahiran' => $validated['tempat_kelahiran'],
        //     'gender' => $validated['gender'],
        //     'umur' => $validated['umur'],
        //     'keluhan' => $validated['keluhan'],
        //     'kondisi' => $validated['kondisi'],
        //     'antrian' => $validated['antrian'],
        //     'konsultasi' => $validated['konsultasi'] ?? false,
        //     'schedule_id' => $validated['schedule_id'],
    ]);

    return redirect()->route('viewdata')->with('success', 'Konsultasi Berhasil');
  }
}
