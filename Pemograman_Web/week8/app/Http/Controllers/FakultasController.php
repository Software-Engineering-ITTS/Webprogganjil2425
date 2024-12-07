<?php
namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'deskripsi' => 'required'
        ]);

        Fakultas::create($request->all());
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan');
    }

    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'deskripsi' => 'required'
        ]);

        $fakultas->update($request->all());
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diupdate');
    }

    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus');
    }
}