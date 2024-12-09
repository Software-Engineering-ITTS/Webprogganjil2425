<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::paginate(5);
        $fakultas = Fakultas::all();
        return view('index', compact('data', 'fakultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required'
        ]);

        $val_data = $request->all();

        if ($request->hasFile('image')) {
            $val_data['image'] = $request->file('image')->store('images', 'public');
        }

        Mahasiswa::create($val_data);

        return redirect('/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'nama' => 'required',
            'prodi' => 'required',
            'alamat' => 'required',
            'id_fakultas' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $val_data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($mahasiswa->image) {
                Storage::disk('public')->delete($mahasiswa->image);
            }

            $val_data['image'] = $request->file('image')->store('images', 'public');
        }

        $mahasiswa->update($val_data);

        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect('/index');
    }
}
