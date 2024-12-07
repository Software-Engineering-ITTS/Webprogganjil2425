<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\book;
use App\Models\transaksi;

class BookController extends Controller
{
    public function index()
    {
        $books = book::latest()->get();

        return view('index', compact('book'));
    }

    public function store(Request $request)
    {
        $val_data = $request->validate([
            "img" => "required",
            "judul" => "required",
            "penulis" => "required",
            "harga" => "required",
            "deskripsi" => "required"
        ]);
        book::create($val_data);

        return redirect('/')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(book $book)
    {
        return view('Update', [
            'data' => $book
        ]);
    }
    public function update(Request $request, book $book)
    {
        $val_data = $request->validate([
            "img" => "required",
            "judul" => "required",
            "penulis" => "required",
            "harga" => "required",
            "deskripsi" => "required"
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $img = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $img);
            $val_data['img'] = $img;
        } else {
            $val_data['img'] = $book->img; // Gunakan nilai lama
        }

        $book->update($val_data);
        return redirect('/')->with('success', 'Buku berhasil diedit');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id); // Pastikan data ditemukan, jika tidak 404
        $book->delete();

        return redirect('/')->with('success', 'Buku berhasil dihapus');
    }
}
