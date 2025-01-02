<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\schedule;
use App\Models\pasien;
use App\Models\viewdata;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function pasien(){
        $pasiens = Pasien::with('schedule')->get(); // untuk mengambil data pasien dan dokter
        Log::info('Data Pasien:', ['pasiens' => $pasiens]);
        return view('viewdata', compact('pasiens'));
    }
}
