<?php

namespace App\Http\Controllers;

use App\Models\jadwal_kerja;
use App\Models\karyawan;
use App\Models\pindah_shift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PindahShiftController extends Controller
{
    // KARYAWAN

    public function pindah($id_jadwal)
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $jadwal_kerja = jadwal_kerja::findOrFail($id_jadwal);

        return view('pindahshift', compact('jadwal_kerja'));
    }

    public function prosespindah(Request $request)
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $val_data = $request->validate([
            'tanggal_pengajuan' => 'required',
            'tanggal_awal' => 'required',
            'shift_awal' => 'required',
            'tanggal_pindah' => 'required',
            'shift_pindah' => 'required',
            'alasan' => 'required',
            'id_karyawan' => 'required',
            'id_jadwal_kerja' => 'required',
        ]);

        // cek apakah tanggal dan shift yang dipilih sudah diajukan sebelumnya oleh karyawan ini
        $existing_shift_request = pindah_shift::where('tanggal_pindah', $val_data['tanggal_pindah'])
            ->where('shift_pindah', $val_data['shift_pindah'])
            ->where('id_karyawan', $val_data['id_karyawan'])
            ->exists();

        if ($existing_shift_request) {
            return redirect()->back()->with('error', 'Tanggal dan shift yang dipilih sudah pernah diajukan.');
        }

        // cek apakah pengajuan sudah ada untuk jadwal kerja ini
        $existing_request_for_schedule = pindah_shift::where('id_karyawan', $val_data['id_karyawan'])
            ->where('id_jadwal_kerja', $val_data['id_jadwal_kerja'])
            ->exists();

        if ($existing_request_for_schedule) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan pindah shift untuk jadwal ini.');
        }

        // cek jika karyawan sudah memiliki jadwal lain dengan tanggal dan shift yang sama
        $conflicting_schedule = jadwal_kerja::where('id_karyawan', $val_data['id_karyawan'])
            ->where('tanggal', $val_data['tanggal_pindah'])
            ->where('shift', $val_data['shift_pindah'])
            ->exists();

        if ($conflicting_schedule) {
            return redirect()->back()->with('error', 'Tanggal dan shift yang dipilih sudah ada pada jadwal kerja Anda.');
        }

        $jadwal_kerja = jadwal_kerja::find($val_data['id_jadwal_kerja']);

        // cek apakah tanggal dan shift yang dipilih sama dengan yang ada di jadwal kerja
        if ($jadwal_kerja->tanggal == $val_data['tanggal_pindah'] && $jadwal_kerja->shift == $val_data['shift_pindah']) {
            return redirect()->back()->with('error', 'Tanggal dan shift yang dipilih tidak berbeda dengan jadwal kerja yang ada.');
        }

        $val_data['status_pengajuan'] = 'Pending';
        $val_data['tanggal_proses'] = null;

        pindah_shift::create($val_data);

        return redirect('/karyawan/riwayatpindah')->with('success', 'Pengajuan pindah shift berhasil dikirim.');
    }

    public function riwayat()
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $id_karyawan = session('karyawan')->id ?? null;

        // Ambil jadwal kerja karyawan berdasarkan ID
        $pindah_shift = pindah_shift::where('id_karyawan', $id_karyawan)->orderBy('tanggal_pengajuan', 'asc')->get();

        // Return ke view dengan data karyawan dan jadwal kerja
        return view('riwayatpindah', compact('pindah_shift'));
    }

    public function destroy($id_shift)
    {
        if (!session()->has('karyawan_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $pindah_shift = pindah_shift::findOrFail($id_shift);

        $pindah_shift->delete();

        return redirect("/karyawan/riwayatpindah");
    }

    // ADMIN

    public function review(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/')->with('error', 'You must be logged in to access this page.');
        }

        $search = $request->input('search');
        $tanggalPengajuan = $request->input('tanggal');

        $query = pindah_shift::with('karyawan');

        if ($search) {
            $query->whereHas('karyawan', function ($k) use ($search) {
                $k->where('nama', 'like', '%' . $search . '%');
            });
        }

        // filter berdasarkan tanggal pengajuan
        if ($tanggalPengajuan) {
            $query->whereDate('tanggal_pengajuan', $tanggalPengajuan);
        }

        $pindah_shift = $query->orderBy('tanggal_pengajuan', 'desc')->get();

        return view('reviewpengajuan', compact('pindah_shift', 'search', 'tanggalPengajuan'));
    }

    public function confirmSetujui($id)
    {
        $pindahShift = pindah_shift::find($id);
        $jadwalKerja = jadwal_kerja::findOrFail($pindahShift->id_jadwal_kerja);

        if (!$pindahShift) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $pindahShift->update([
            'status_pengajuan' => 'Disetujui',
            'tanggal_proses' => Carbon::now('Asia/Jakarta'),
        ]);

        $jadwalKerja->update([
            'tanggal' => $pindahShift->tanggal_pindah,
            'shift' => $pindahShift->shift_pindah,
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil disetujui.');
    }

    public function confirmTolak($id)
    {
        $pindahShift = pindah_shift::find($id);
        $jadwalKerja = jadwal_kerja::findOrFail($pindahShift->id_jadwal_kerja);

        if (!$pindahShift) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $pindahShift->update([
            'status_pengajuan' => 'Ditolak',
            'tanggal_proses' => Carbon::now('Asia/Jakarta'), 
        ]);

        $jadwalKerja->update([
            'tanggal' => $pindahShift->tanggal_awal,
            'shift' => $pindahShift->shift_awal,
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil ditolak.');
    }
}