<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Ambil semua data buku
        return view('books.index', compact('books')); // Kirim ke view index
    }

    public function create()
    {
        return view('books.create'); // Formulir untuk menambah buku baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|integer',
        ]);

        Book::create($request->all()); // Simpan buku baru
        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id); // Ambil data buku berdasarkan ID
        return view('books.edit', compact('book')); // Kirim ke view edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|integer',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all()); // Update buku
        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        Book::destroy($id); // Hapus buku berdasarkan ID
        return redirect()->route('books.index');
    }
}
