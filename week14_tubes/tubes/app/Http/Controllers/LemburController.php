<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lembur;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class LemburController extends Controller
{
    public function index()
    {
        try {
            $lembur = Lembur::with('user')->get();
            return view('lembur.index', compact('lembur'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memuat data lembur.']);
        }
    }

    public function create()
    {
        try {
            return view('lembur.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memuat halaman tambah lembur.']);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'tanggal' => 'required|date',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
                'keterangan' => 'required|string|max:255',
            ]);

            $validated['user_id'] = auth()->id();
            Lembur::create($validated);

            return redirect()->route('karyawan.lembur.create')->with('success', 'Lembur berhasil ditambahkan');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan lembur.']);
        }
    }

    public function edit($id)
    {
        try {
            $lembur = Lembur::findOrFail($id);
            return view('lembur.edit', compact('lembur'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.lembur.index')->withErrors(['error' => 'Data lembur tidak ditemukan.']);
        } catch (\Exception $e) {
            return redirect()->route('admin.lembur.index')->withErrors(['error' => 'Terjadi kesalahan saat memuat halaman edit lembur.']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'tanggal' => 'required|date',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
                'keterangan' => 'required|string|max:255',
                'status' => 'required|in:pending,approved,declined',
            ]);

            $lembur = Lembur::findOrFail($id);
            $lembur->update($validated);

            return redirect()->route('admin.lembur.index')->with('success', 'Lembur berhasil diubah');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.lembur.index')->withErrors(['error' => 'Data lembur tidak ditemukan.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mengubah lembur.']);
        }
    }

    public function destroy($id)
    {
        try {
            $lembur = Lembur::findOrFail($id);
            $lembur->delete();

            return redirect()->route('admin.lembur.index')->with('success', 'Lembur berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.lembur.index')->withErrors(['error' => 'Data lembur tidak ditemukan.']);
        } catch (\Exception $e) {
            return redirect()->route('admin.lembur.index')->withErrors(['error' => 'Terjadi kesalahan saat menghapus lembur.']);
        }
    }
}
