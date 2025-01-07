<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Maintenance;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesins = Mesin::all(); // Data mesin untuk dropdown
        $jadwals = Jadwal::all(); // Data jadwal untuk dropdown
        $users = User::all(); // Data user untuk dropdown
        $maintenanceRecords = Maintenance::with('mesin', 'jadwal', 'user')->get(); // Mengambil data relasi

        // $maintenance = Maintenance::with('user')->get(); // atau 'teknisi' jika relevan

        // dd($maintenance);
        // dd($maintenance->toArray());
        // dd($maintenance->toArray());

        return view('mesin.maintenance', compact('mesins', 'maintenanceRecords', 'users', 'jadwals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mesin_id' => 'required|exists:mesin,id',
            'user_id' => 'required|exists:users,id',
            'jadwal_id' => 'nullable|exists:jadwal,jadwal_id', // Opsional karena bisa dibuat otomatis
            'maintenance_date' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed',
            'deskripsi_perawatan' => 'nullable|string',
        ]);

        // Membuat jadwal jika tidak ada jadwal_id
        $jadwal = $request->jadwal_id ? Jadwal::find($request->jadwal_id) : Jadwal::create([
            'mesin_id' => $request->mesin_id,
            'tanggal_jadwal' => $request->maintenance_date,
            'waktu_jadwal' => now()->format('H:i:s'), // Contoh waktu default
        ]);

        // Membuat data maintenance
        Maintenance::create([
            'mesin_id' => $request->mesin_id,
            'user_id' => $request->user_id,
            'jadwal_id' => $jadwal->jadwal_id, // Menggunakan ID dari jadwal yang dibuat
            'maintenance_date' => $request->maintenance_date,
            'status' => $request->status,
            'deskripsi_perawatan' => $request->deskripsi_perawatan,
        ]);

        return redirect()->route('maintenance.index')->with('success', 'Data maintenance berhasil disimpan.');
    }

    /**
     * Edit a specific maintenance record.
     */
    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $mesins = Mesin::all();
        $jadwals = Jadwal::all();
        $users = User::all();

        return view('mesin.editmaintenance', compact('maintenance', 'mesins', 'jadwals', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mesin_id' => 'required|exists:mesin,id',
            'user_id' => 'required|exists:users,id',
            'jadwal_id' => 'nullable|exists:jadwal,jadwal_id',
            'maintenance_date' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed',
            'deskripsi_perawatan' => 'nullable|string',
        ]);

        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($request->all());

        return redirect()->route('maintenance.index')->with('success', 'Data maintenance berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();

        return redirect()->route('maintenance.index')->with('success', 'Data maintenance berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
{
    $maintenance = Maintenance::find($id);
    $maintenance->status = $request->status;
    $maintenance->save();

    return redirect()->route('maintenance.index')->with('success', 'Status maintenance berhasil diperbarui.');
}

public function updateTeknisi(Request $request, $id)
{
    $maintenance = Maintenance::find($id);
    $maintenance->teknisi_id = $request->teknisi_id;
    $maintenance->save();

    return redirect()->route('maintenance.index')->with('success', 'Teknisi berhasil diperbarui.');
}

    public function updateDeskripsi(Request $request, $id)
{
    $request->validate([
        'deskripsi_perawatan' => 'nullable|string',
    ]);

    $maintenance = Maintenance::findOrFail($id);
    $maintenance->deskripsi_perawatan = $request->deskripsi_perawatan;
    $maintenance->save();

    return redirect()->route('maintenance.index')->with('success', 'Deskripsi perawatan berhasil diperbarui.');
}

}
