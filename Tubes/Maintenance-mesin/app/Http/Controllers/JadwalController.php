<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mesin;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Daftar Jadwal
    public function index()
    {
        // Mengambil semua data jadwal beserta relasi dengan mesin
        $jadwal = Jadwal::with('mesin')->get();
        $mesins = Mesin::all();

        // Return view dengan data yang diperlukan
        return view('mesin.jadwal', compact('jadwal', 'mesins'));

    }

    // Form Tambah Jadwal
    public function create()
    {
        // Mengambil semua data mesin dan user (teknisi)
        $mesins = Mesin::all();
        $users = User::all();

        // Mengirim data ke view untuk form input jadwal
        return view('mesin.jadwal', compact('mesins', 'users'));
    }

    // Edit Jadwal
    // public function edit($id)
    // {
    //     // Menemukan jadwal berdasarkan ID
    //     $jadwal = Jadwal::findOrFail($id);
    //     $mesins = Mesin::all();  // Mengambil semua mesin
    //     $users = User::all();  // Mengambil semua user/teknisi

    //     // Mengirim data ke view untuk ditampilkan
    //     return view('mesin.edit-jadwal', compact('jadwal', 'mesins', 'users'));
    // }

    // Update Jadwal
    // public function update(Request $request, $id)
    // {
    //     try {
    //         // Validasi input
    //         $request->validate([
    //             'mesin_id' => 'required|exists:mesin,id', // Pastikan id mesin valid
    //             'maintenance_date' => 'required|date',
    //             'status' => 'required|in:Pending,In Progress,Completed',
    //             'user_id' => 'nullable|exists:users,id', // Pastikan user_id valid (untuk form Maintenance)
    //             'deskripsi_perawatan' => 'nullable|string', // Kolom deskripsi perawatan (opsional)
    //         ]);

    //         // Cari dan update jadwal
    //         $jadwal = Jadwal::findOrFail($id);
    //         $jadwal->update([
    //             'mesin_id' => $request->mesin_id,
    //             'maintenance_date' => $request->maintenance_date,
    //             'status' => $request->status,
    //             'user_id' => $request->user_id, // Menyimpan user_id (teknisi, jika ada)
    //             'deskripsi_perawatan' => $request->deskripsi_perawatan, // Menyimpan deskripsi perawatan (opsional)
    //         ]);

    //         return redirect()->route('jadwal.index')->with('success', 'Jadwal maintenance berhasil diperbarui!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }

    // Simpan Jadwal
    // public function store(Request $request)
    // {
    //     try {

    //         // dd($request->all());
    //         // Validasi input
    //         $request->validate([
    //             'mesin_id' => 'required|exists:mesin,id', // Pastikan id mesin valid
    //             'maintenance_date' => 'required|date',
    //             'status' => 'required|in:Pending,In Progress,Completed',
    //         ], [
    //             'mesin_id.required' => 'Pilih mesin yang akan di-maintenance.',
    //             'maintenance_date.required' => 'Tanggal maintenance wajib diisi.',
    //             'status.required' => 'Status wajib diisi.',
    //             'status.in' => 'Status tidak valid.',
    //         ]);


    //         // Menyimpan data ke tabel jadwal
    //         Jadwal::create([
    //             'mesin_id' => $request->mesin_id,
    //             'maintenance_date' => $request->maintenance_date,
    //             'status' => $request->status,
    //         ]);

    //         return redirect()->route('jadwal.index')->with('success', 'Jadwal maintenance berhasil disimpan!');
    //     } catch (\Exception $e) {
    //         // Kembalikan ke halaman sebelumnya dengan pesan error
    //         return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'mesin_id' => 'required|exists:mesin,mesin_id',
        'maintenance_date' => 'required|date',
        'status' => 'required|string',
    ]);

    // Buat data baru di database
    $jadwal = Jadwal::create($validatedData);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('jadwal.index')->with('success', 'Jadwal maintenance berhasil dibuat!');
}

}
