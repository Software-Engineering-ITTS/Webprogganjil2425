<?php
namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    // Menampilkan daftar gaji
    public function index()
{
    $gajis = Gaji::with('karyawan')->get(); // Mengambil data gaji beserta relasi karyawan
    $karyawans = Karyawan::all(); // Mengambil data karyawan untuk form
    return view('gaji.index', compact('gajis', 'karyawans'));
}


    // Menampilkan form tambah gaji
    public function create()
{
    $karyawans = Karyawan::all(); 
    $gajis = Gaji::with('karyawan')->get(); 
    return view('gaji', compact('karyawans', 'gajis'));
}


    // Menyimpan data gaji ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'total_hadir' => 'required|integer|min:0',
            'total_alpha' => 'required|integer|min:0',
            'gaji_pokok' => 'required|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
        ]);

        // Menghitung gaji bersih
        $gaji_bersih = $validated['gaji_pokok'] 
                     + ($validated['tunjangan'] ?? 0) 
                     + ($validated['bonus'] ?? 0) 
                     - ($validated['potongan'] ?? 0);

        // Menyimpan data gaji ke dalam database
        Gaji::create([
            'karyawan_id' => $validated['karyawan_id'],
            'total_hadir' => $validated['total_hadir'],
            'total_alpha' => $validated['total_alpha'],
            'gaji_pokok' => $validated['gaji_pokok'],
            'potongan' => $validated['potongan'] ?? 0,
            'tunjangan' => $validated['tunjangan'] ?? 0,
            'bonus' => $validated['bonus'] ?? 0,
            'gaji_bersih' => $gaji_bersih,
        ]);

        return redirect()->route('gaji.store');
    }
}
