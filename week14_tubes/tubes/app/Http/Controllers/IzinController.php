<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\izin;

class IzinController extends Controller
{
    public function index()
    {
        $izin = Izin::with('user')->get();
        $user = User::all();
        $izin = Izin::with('user')->get();
        return view('izin.index', compact('izin'));
    }

    public function create()
    {
        return view('izin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_izin' => 'required|in:sakit,cuti,lainnya',
            'tanggal_mulai' => 'required|date|before_or_equal:tanggal_selesai',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|max:255',
            'status' => 'required|in:pending,approved,declined'
        ], [
            'jenis_izin.required' => 'Jenis izin wajib diisi.',
            'jenis_izin.in' => 'Jenis izin tidak valid.',
            'tanggal_mulai.required' => 'Tanggal mulai cuti wajib diisi.',
            'tanggal_mulai.before_or_equal' => 'Tanggal mulai harus sebelum atau sama dengan tanggal selesai.',
            'tanggal_selesai.required' => 'Tanggal selesai cuti wajib diisi.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'alasan.required' => 'Alasan cuti wajib diisi.',
            'alasan.max' => 'Alasan tidak boleh lebih dari 255 karakter.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status tidak valid.'
        ]);

        $validated['user_id'] = auth()->id();

        try {
            izin::create($validated);
            return redirect()->route('izin.index')->with('success', 'Izin berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menyimpan izin. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $izin = izin::findOrFail($id);
        return view('izin.edit', compact('izin'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_izin' => 'required|in:sakit,cuti,lainnya',
            'tanggal_mulai' => 'required|date|before_or_equal:tanggal_selesai',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|max:255',
            'status' => 'required|in:pending,approved,declined'
        ], [
            'jenis_izin.required' => 'Jenis izin wajib diisi.',
            'jenis_izin.in' => 'Jenis izin tidak valid.',
            'tanggal_mulai.required' => 'Tanggal mulai cuti wajib diisi.',
            'tanggal_mulai.before_or_equal' => 'Tanggal mulai harus sebelum atau sama dengan tanggal selesai.',
            'tanggal_selesai.required' => 'Tanggal selesai cuti wajib diisi.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'alasan.required' => 'Alasan cuti wajib diisi.',
            'alasan.max' => 'Alasan tidak boleh lebih dari 255 karakter.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status tidak valid.'
        ]);

        $izin = izin::findOrFail($id);

        try {
            $izin->update($validated);
            return redirect()->route('admin.izin.index')->with('success', 'Izin berhasil diubah');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui izin. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        $izin = izin::findOrFail($id);

        try {
            $izin->delete();
            return redirect()->route('admin.izin.index')->with('success', 'Izin berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat menghapus izin. Silakan coba lagi.');
        }
    }
}
