<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\presensi;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = presensi::all();
        $user = User::all();
        $presensi = Presensi::with('user')->get();
        return view('presensi.index', compact('presensi', 'user'));
    }

    public function show()
    {
        return redirect()->route('presensi.index');
    }

    public function create()
    {
        // $user = User::where('role', 'karyawan')->get();
        return view('presensi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
        ]);

        $validated['user_id'] = auth()->id();
        $presensi = Presensi::create($validated);

        return redirect()->route('presensi.create')->with('success', 'Presensi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $presensi = Presensi::findOrFail($id);
        // $user = User::where('role', 'karyawan')->get();
        return view('presensi.edit', compact('presensi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'user_id' => 'required|exists:users,id',
        ]);

        // Ambil data presensi berdasarkan ID
        $presensi = Presensi::findOrFail($id);

        // Perbarui data presensi
        $presensi->update([
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
        ]);

        // Redirect ke halaman data presensi dengan pesan sukses
        return redirect()->route('admin.presensi.index')->with('success', 'Presensi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        try {
            $presensi->delete();
            return redirect()->route('admin.presensi.index')->with('success', 'Presensi berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menghapus presensi. Silakan coba lagi.');
        }
    }
}
