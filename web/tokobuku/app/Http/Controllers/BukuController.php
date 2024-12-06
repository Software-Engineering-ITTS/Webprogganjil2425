<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{

    // public function store(Request $request)
    // {
    //     dd($request->all()); // Ini akan menampilkan semua data yang diterima dari form
    // }


    public function store(Request $request)
    {

        // form data validation
        $request->validate([
            'book_title' => 'required',
            'author_name' => 'required',
            'publication_year' => 'required|integer',
            'synopsis' => 'required',
            'price' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg, jpg, png',
        ]);

        // upload cover image
        if ($request->hasFile('cover_photo') && $request->file('cover_photo')->isValid()) {
            // Menyimpan gambar ke folder 'covers' di storage
            $coverpath = $request->file('cover_photo')->store('public/covers');
        } else {
            // Atau bisa mengatur default atau error jika file tidak ada
            $coverpath = null;
        }

        // save book data to db
        Buku::create([
            'book_title' => $request->book_title,
            'author_name' => $request->author_name,
            'publication_year' => $request->publication_year,
            'synopsis' => $request->synopsis,
            'price' => $request->price,
            'cover_photo' => $coverpath,
        ]);

        // if got it
        return redirect('/add')->with('success', 'Book has been added');
    }

    public function show($id)
    {
        $book = Buku::findOrFail($id);
        return view('show', compact('book'));
    }

    public function index()
    {
        $books = Buku::all();
        return view('show', compact('books'));
    }

    public function edit($id)
    {
        $book = Buku::findOrFail($id);
        return view('edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'book_title' => 'required',
            'author_name' => 'required',
            'publication_year' => 'required|integer',
            'synopsis' => 'required',
            'price' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $book = Buku::findOrFail($id);

        if ($request->hasFile('cover_photo') && $request->file('cover_photo')->isValid()) {

            if ($book->cover_photo) {
                Storage::delete($book->cover_photo);
            }

            $book->cover_photo = $request->file('cover_photo')->store('public/covers');
        }

        $book->update([
            'book_title' => $request->book_title,
            'author_name' => $request->author_name,
            'publication_year' => $request->publication_year,
            'synopsis' => $request->synopsis,
            'price' => $request->price,
        ]);

        return redirect('/show')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Buku::findOrFail($id);
        if ($book->cover_photo) {
            Storage::delete($book->cover_photo);
        }
        $book->delete();
        return redirect('/show')->with('success', 'Book deleted successfully.');
    }
}
