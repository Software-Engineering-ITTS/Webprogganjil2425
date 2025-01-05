<?php

namespace App\Http\Controllers;

use App\Models\jadwal_kerja;
use App\Models\karyawan;
use App\Models\presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalKerjaController extends Controller
{
    // ADMIN

    public function show($id_karyawan, Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        // parameter filter
        $filterShift = $request->get('filtershift');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $query = jadwal_kerja::where('id_karyawan', $id_karyawan);

        if ($filterShift) {
            $query->where('shift', $filterShift);
        }

        if ($startDate) {
            $query->whereDate('tanggal', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('tanggal', '<=', $endDate);
        }

        $jadwal_kerja = $query->orderBy('tanggal', 'desc')->get();

        $karyawan = karyawan::findOrFail($id_karyawan);

        return view('detailjadwal', compact('karyawan', 'jadwal_kerja', 'filterShift', 'startDate', 'endDate'));
    }

    public function create($id_karyawan)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $karyawan = karyawan::findOrFail($id_karyawan);

        return view('tambahjadwal', compact('karyawan'));
    }

    public function store(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $valdata = $request->validate([
            'tanggal' => 'required',
            'shift' => 'required',
            'id_karyawan' => 'required',
        ]);

        // cek apakah sudah ada jadwal dengan tanggal dan shift yang sama
        $existingSchedule = jadwal_kerja::where('tanggal', $valdata['tanggal'])
            ->where('shift', $valdata['shift'])
            ->where('id_karyawan', $valdata['id_karyawan'])
            ->exists();

        if ($existingSchedule) {
            return redirect()->back()->with('error', 'Jadwal dengan tanggal dan shift yang sama sudah ada.');
        }

        jadwal_kerja::create($valdata);

        return redirect("/admin/detailjadwal/{$request->id_karyawan}");
    }

    public function edit($id_jadwal)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $jadwal_kerja = jadwal_kerja::findOrFail($id_jadwal);

        return view('editjadwal', compact('jadwal_kerja'));
    }

    public function update(Request $request, $id_jadwal)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $jadwal_kerja = jadwal_kerja::findOrFail($id_jadwal);

        $valdata = $request->validate([
            'tanggal' => 'required',
            'shift' => 'required',
        ]);

        $existingSchedule = jadwal_kerja::where('tanggal', $valdata['tanggal'])
            ->where('shift', $valdata['shift'])
            ->where('id_karyawan', $jadwal_kerja->id_karyawan)
            ->exists();

        if ($existingSchedule) {
            return redirect()->back()->with('error', 'Jadwal dengan tanggal dan shift yang sama sudah ada.');
        }

        $jadwal_kerja->update($valdata);

        return redirect("/admin/detailjadwal/{$jadwal_kerja->id_karyawan}")->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id_jadwal)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $jadwal_kerja = jadwal_kerja::findOrFail($id_jadwal);

        $id_karyawan = $jadwal_kerja->id_karyawan;

        $jadwal_kerja->delete();

        return redirect("/admin/detailjadwal/{$id_karyawan}");
    }

    // KARYAWAN

    public function showkar(Request $request)
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $id_karyawan = session('karyawan')->id ?? null;

        // parameter filter
        $filterShift = $request->get('filtershift');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $query = jadwal_kerja::where('id_karyawan', $id_karyawan);

        if ($filterShift) {
            $query->where('shift', $filterShift);
        }

        if ($startDate) {
            $query->whereDate('tanggal', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('tanggal', '<=', $endDate);
        }

        $jadwal_kerja = $query->orderBy('tanggal', 'asc')->get();

        $jadwal_kerja = $query->orderBy('tanggal', 'asc')->get();

        // hitung selisih hari untuk setiap jadwal dan menambahkannya ke data jadwal
        foreach ($jadwal_kerja as $jadwal) {
            $tanggal_kerja = Carbon::parse($jadwal->tanggal);
            $hari_ini = Carbon::now('Asia/Jakarta');
            $selisih_hari = $hari_ini->diffInDays($tanggal_kerja, false); // false untuk menghitung selisih negatif jika tanggal sudah lewat

            // menentukan apakah shift dapat diubah
            $jadwal->selisih_hari = $selisih_hari;
            $jadwal->can_change_shift = $selisih_hari >= 3; // hanya berlaku jika >= 3 hari
        }

        return view('lihatjadwal', compact('jadwal_kerja'));
    }
}