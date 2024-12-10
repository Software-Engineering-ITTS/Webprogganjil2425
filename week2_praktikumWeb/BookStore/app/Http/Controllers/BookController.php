<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Transaction;

// app/Http/Controllers/BookController.php
class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'cover' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('covers'), $filename);
            $validated['cover'] = $filename;
        }

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }
}