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
        $coverpath = $request->file('cover_photo')->store('covers');

        // save book data to db
        Buku::create([
            'book_title' => $request->title,
            'author_name' => $request->authorname,
            'publication_year' => $request->publicationyear,
            'synopsis' => 'required',
            'price' => $request->price,
            'cover_photo' => $coverpath,
        ]);

        // if got it
        return redirect('/add')->with('success', 'Book has been added');
    }
}
