<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    /**
     * Form Pendaftaran.
     */
    public function formPendaftaran()
{
    return view('forms.pendaftaran'); // Harus sesuai dengan path file
}

    /**
     * Simpan data pendaftaran.
     */
    public function storePendaftaran(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);

        // Buat kode unik acak
        $eventCode = strtoupper(\Str::random(8)); // Kode acak 8 karakter

        // Simpan data pendaftaran (jika ada model)
        // Contoh:
        /*
        Pendaftaran::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'event_code' => $eventCode,
        ]);
        */

        // Redirect ke halaman kode acara dengan session
        return redirect()->route('kode.acara')->with([
            'name' => $validated['name'],
            'eventCode' => $eventCode,
        ]);
    }
    public function kodeAcara()
    {
        // Ambil data dari session
        $name = session('name');
        $eventCode = session('eventCode');

        // Jika session tidak ada, kembalikan ke form pendaftaran
        if (!$name || !$eventCode) {
            return redirect()->route('pendaftaran')->withErrors(['error' => 'Data tidak ditemukan, silakan daftar ulang.']);
        }

        // Tampilkan halaman kode acara
        return view('kode_acara', compact('name', 'eventCode'));
    }
    /**
     * Form Konfirmasi Kehadiran.
     */
    public function formKehadiran()
{
    return view('forms.kehadiran'); // Harus sesuai dengan path file
}

    /**
     * Simpan data kehadiran.
     */
    public function storeKehadiran(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'event_code' => 'required|string|exists:pendaftarans,event_code',
        'bukti_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan file foto ke direktori storage
    $filePath = $request->file('bukti_foto')->store('bukti_kehadiran', 'public');

    // Simpan data ke database (opsional)
    /*
    Kehadiran::create([
        'event_code' => $validated['event_code'],
        'bukti_foto' => $filePath,
    ]);
    */

    // Redirect ke halaman sukses
    return redirect()->route('kehadiran_sukses');
}
public function kehadiranSukses()
{
    return view('kehadiran_sukses');
}

}
