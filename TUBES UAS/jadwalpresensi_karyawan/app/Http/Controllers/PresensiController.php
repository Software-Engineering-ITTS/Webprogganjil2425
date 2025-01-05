<?php

namespace App\Http\Controllers;

use App\Models\jadwal_kerja;
use App\Models\presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    // KARYAWAN

    public function presensi($id_jadwal)
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $jadwal_kerja = jadwal_kerja::findOrFail($id_jadwal);

        return view('presensi', compact('jadwal_kerja'));
    }

    public function prosespresensi(Request $request)
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $val_data = $request->validate([
            'status_hadir' => 'required',
            'tanggal' => 'required|date_format:Y-m-d',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'id_karyawan' => 'required',
            'id_jadwal_kerja' => 'required'
        ]);

        if ($val_data['status_hadir'] == 'Hadir') {
            $val_data['jam_keluar'] = null;
        } else {
            $val_data['jam_keluar'] = "00:00";
        }

        $jadwal_kerja = jadwal_kerja::find($val_data['id_jadwal_kerja']);

        if (!$jadwal_kerja) {
            return redirect()->back()->with('error', 'Jadwal kerja tidak ditemukan.');
        }

        $shiftStartTime = ($jadwal_kerja->shift == 'Pagi (07:00 - 15:00)') ? '07:00' : '15:00'; // Shift pagi mulai jam 07:00, shift malam mulai jam 15:00

        if (in_array($val_data['status_hadir'], ['Izin', 'Sakit'])) {
            $statusWaktu = 'Tidak Ada';
        } else {
            $jamMasuk = $val_data['jam_masuk'];
            $statusWaktu = Carbon::parse($jamMasuk)->lte(Carbon::parse($shiftStartTime)) ? 'Tepat Waktu' : 'Terlambat';
        }

        // cek apakah pengajuan sudah ada untuk jadwal kerja ini
        $existing_presensi = presensi::where('id_karyawan', $val_data['id_karyawan'])
            ->where('id_jadwal_kerja', $val_data['id_jadwal_kerja'])
            ->exists();

        if ($existing_presensi) {
            return redirect()->back()->with('error', 'Anda sudah melakukan presensi.');
        }

        $val_data['status_waktu'] = $statusWaktu; // set status waktu berdasarkan jam masuk

        presensi::create($val_data);

        return redirect('/karyawan/riwayatpresensi')->with('success', 'Presensi berhasil dikirim.');
    }

    public function riwayat()
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $id_karyawan = session('karyawan')->id ?? null;

        $presensi = presensi::where('id_karyawan', $id_karyawan)
            ->with('jadwalKerja')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('riwayatpresensi', compact('presensi'));
    }

    // public function konfirmkeluar($id)
    // {
    //     $presensi = presensi::find($id);

    //     if (!$presensi) {
    //         return redirect()->back()->with('error', 'Data presensi tidak ditemukan.');
    //     }

    //     $presensi->jam_keluar = Carbon::now('Asia/Jakarta')->format('H:i');
    //     $presensi->save();

    //     return redirect()->back()->with('success', 'Jam keluar berhasil dikonfirmasi.');
    // }

    public function konfirmkeluar(Request $request, $id)
    {
        // Validasi input waktu
        $request->validate([
            'jam_keluar' => 'required|date_format:H:i',
        ]);

        // Cari data presensi berdasarkan ID
        $presensi = presensi::findOrFail($id);

        // Update jam keluar
        $presensi->jam_keluar = $request->input('jam_keluar');
        $presensi->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Jam keluar berhasil diperbarui.');
    }

    // ADMIN

    public function review(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $search = $request->input('search');
        $tanggalPresensi = $request->input('tanggal');

        $query = presensi::with('karyawan');

        if ($search) {
            $query->whereHas('karyawan', function ($k) use ($search) {
                $k->where('nama', 'like', '%' . $search . '%');
            });
        }

        if ($tanggalPresensi) {
            $query->whereDate('tanggal', $tanggalPresensi);
        }

        $presensi = $query->orderBy('tanggal', 'desc')->get();

        return view('reviewpresensi', compact('presensi'));
    }

    public function reportPresensi(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $tanggalPresensi = $request->input('tanggal', now()->format('Y-m-d'));
        $search = $request->input('search');

        $jadwalKaryawan = jadwal_kerja::with('karyawan')
            ->whereDate('tanggal', $tanggalPresensi)
            ->get();

        $query = presensi::with('karyawan')->whereDate('tanggal', $tanggalPresensi);

        if ($search) {
            $query->whereHas('karyawan', function ($k) use ($search) {
                $k->where('nama', 'like', '%' . $search . '%');
            });
        }

        $presensi = $query->get();

        // hitung jumlah hadir, sakit, izin, dan alpha
        $hadir = $presensi->where('status_hadir', 'Hadir')->count();
        $sakit = $presensi->where('status_hadir', 'Sakit')->count();
        $izin = $presensi->where('status_hadir', 'Izin')->count();

        // hitung alpha dengan membandingkan jadwal dan presensi, belum bisa
        $alphaKaryawan = $jadwalKaryawan->whereNotIn('karyawan_id', $presensi->pluck('karyawan_id'));
        $alpha = $alphaKaryawan->count();

        $summary = [
            'hadir' => $hadir,
            'sakit' => $sakit,
            'izin'  => $izin,
            'alpha' => $alpha, // belum bisa
        ];

        return view('reportpresensi', compact('presensi', 'summary', 'tanggalPresensi', 'alphaKaryawan'));
    }
}
