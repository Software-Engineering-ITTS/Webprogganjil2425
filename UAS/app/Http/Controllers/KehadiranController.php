<?php

namespace App\Http\Controllers;
use App\Models\kehadiran;
use App\Models\event;
use Illuminate\Http\Request;
class KehadiranController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
        'id_event' => 'required',
        'datadiri' => 'required',
        'hadir' => 'required',
        ]);
        // Simpan data ke database
        kehadiran::create($validatedData);

        // Redirect ke halaman sukses
        $events = event::all();

        return view('menuuser', ['data' => $events]);
    }

    public function index()
{
    $events = kehadiran::all(); // Ambil semua data event
    return view('riwayat', ['data' => $events]);
}

}
