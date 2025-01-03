<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log; //memeriksa apakah ada eror di log
use Illuminate\Http\Request;
use App\Models\pasien;
use App\Models\schedule; //import untuk penyambungan dokter ke dropdown konsul

class FormkonsultasiController extends Controller
{
    public function formkonsul(){

        $doctors = schedule::all();
        $pasiens = pasien::latest()->take(5)->get();
        return view('formkonsultasi', compact('doctors', 'pasiens'));

    }
    public function konsul(Request $request){
        $validatedData = $request->validate([
            // 'id' => 'required|exists:schedule,id',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'tempat_kelahiran' => 'required|string|max:50',
            'gender' => 'required|string',
            'umur' => 'required|string',
            'keluhan' => 'required|string|max:500',
            'kondisi' => 'required|string',
            'konsultasi' => 'required|string',
            //'id' => 'required|exists:schedule,id',
            'id' => 'required',
            'antrian' => 'nullable|string',
        ]);


        Log::info('Validated data:' , $validatedData);
        //untuk menyimpan data ke database
        pasien::create([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'tempat_kelahiran' => $validatedData['tempat_kelahiran'],
            'gender' => $validatedData['gender'],
            'umur' => $validatedData['umur'],
            'keluhan' => $validatedData['keluhan'],
            'kondisi' => $validatedData['kondisi'],
            'konsultasi' => $validatedData['konsultasi'],
            'iddokter' => $validatedData['id'],
           'antrian' => $validatedData['antrian'] ?? 'Normal',

        ]);

        Log::info('Session data:', session()->all());


        // session()->flash('success', 'Konsultasi berhasil');
        return redirect()->route('formkonsultasi')->with('success', 'konsultasi sukses');
        //return redirect()->route('formkonsultasi')->with('success', 'Konsultasi Sukses');
    }
}
