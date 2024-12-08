<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function app()
    {
        $bukus = Buku::all();
        return view('barang.app', compact('bukus'));
    }

//     public function store(Request $request)
//     {
//         $val_data = $request->validate([
//             'judul' => 'required',
//             'cover' => 'required',
//             'pengarang' => 'required',
//             'kategori' => 'required',
//             'stock' => 'required',
//             'harga' => 'required',

//         ]);

//         Buku::create($val_data);

//         return redirect('/');
//     }

//     public function edit($id)
//     {
//         $bukus = Buku::find($id);
//         return view('edit', compact('bukus'));
//     }

//     public function update(Request $request, $id)
//     {
//         $val_data = $request->validate([
//             'judul' => 'required',
//             'kategori' => 'required',
//             'pengarang' => 'required',
//             'cover' => 'required',
//         ]);

//         $buku = Buku::findOrFail($id);
//         $buku->update($val_data);

//         return redirect('/')->with('success', 'Buku berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $buku = Buku::findOrFail($id);
//         $buku ->delete();

//         return redirect('/')->with('success', 'Buku berhasil dihapus.');
//     }

//     public function show(Request $request)
//     {
//         return redirect("/");
//     }
}
