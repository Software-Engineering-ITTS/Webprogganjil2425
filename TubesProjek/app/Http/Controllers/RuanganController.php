<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    
    public function index()
    {
        $ruangans = ruangan::all();

        return view('ruangans.index', compact('ruangans'));
    }

    
    public function create()
    {
        return view('ruangans.create');
    }

    
    public function store(Request $request)
    {
        $val_data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kapasitas' => 'required',
           'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        ruangan::create($val_data);

        return redirect()->route('ruangans.index');
    }

    public function edit(Ruangan $ruangan)
    {
        return view('ruangans.edit', compact('ruangan'));
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kapasitas' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $ruangan->update($request->all());

        return redirect()->route('ruangans.index');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();

        return redirect()->route('ruangans.index');
    }
}
