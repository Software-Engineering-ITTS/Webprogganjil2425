<?php

namespace App\Http\Controllers;

use App\Models\Bookss;
use Illuminate\Http\Request;

class BookssController extends Controller
{
    public function index()
{
    $bookss = Bookss::all();
    return view('index', compact('bookss'));
}


    public function store(Request $request)
    {
        $val_data = $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Tahun_terbit' => 'required|integer',
            'Stock' => 'required|integer',
            'Harga' => 'required|integer',
            'Cover' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        // Menangani upload gambar
        if ($request->hasFile('Cover')) {
            $val_data['Cover'] = $request->file('Cover')->store('covers', 'public');
        }

        // Simpan data buku
        Bookss::create($val_data);

        return redirect('/');
    }

    public function edit($id)
{
    $bookss = Bookss::findOrFail($id);
    return view('edit', compact('bookss'));
}

public function update(Request $request, Bookss $bookss)
{
    // Validasi data
    $val_data = $request->validate([
        'Judul' => 'required',
        'Penulis' => 'required',
        'Tahun_terbit' => 'required|integer',
        'Stock' => 'required|integer',
        'Harga' => 'required|integer',
        'Cover' => 'nullable|image|max:2048',
    ]);

    $bookss->update($val_data);

    if ($request->hasFile('Cover')) {
        if ($bookss->Cover) {
            \Storage::disk('public')->delete($bookss->Cover); // Hapus cover lama
        }
        $bookss->Cover = $request->file('Cover')->store('covers', 'public');
        $bookss->save();
    }

   
    return redirect('/')->with('success', 'Book updated successfully');
}


    
    public function destroy(Bookss $bookss)
    {
        $bookss->delete();
        return redirect('/');
    }
}
