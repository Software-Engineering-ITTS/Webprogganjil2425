<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.formbarang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        }

        Barang::create([
            'nama' => $request->nama,
            'foto' => $filename,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('formbarang')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.editbarang', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $barang->nama = $validatedData['nama'];
        $barang->stok = $validatedData['stok'];
        $barang->harga = $validatedData['harga'];

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($barang->foto && file_exists(public_path('images/' . $barang->foto))) {
                unlink(public_path('images/' . $barang->foto));
            }

            // Simpan foto baru
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            $barang->foto = $filename;
        }

        $barang->save();

        return redirect()->route('formbarang')->with('success', 'Barang updated successfully!');
    }


    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('formbarang')->with('success', 'Barang berhasil dihapus!');
    }
}
