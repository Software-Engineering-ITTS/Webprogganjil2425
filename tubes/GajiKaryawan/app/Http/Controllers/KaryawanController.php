<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
        ]);

        Karyawan::create($validatedData);

        return redirect()->route('karyawan.store');
    }

    public function edit($id)
    {
        $karyawans = Karyawan::findOrFail($id);
        return view('edit', compact('karyawans'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
        ]);

        $karyawans = Karyawan::findOrFail($id);
        $karyawans->update($validatedData);

        return redirect()->route('karyawan.index');

    }
    public function destroy($id)
    {
        $karyawans = Karyawan::findOrFail($id);
        $karyawans->delete();

        return redirect()->route('karyawan.index');
    }
}
