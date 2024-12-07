<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->stock = $request->stock;

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $book->cover_image = $path;
        }

        $book->save();
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->stock = $request->stock;

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $book->cover_image = $path;
        }

        $book->save();
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function buy(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $book->stock,
        ]);

        $quantity = $request->input('quantity');
        $totalPrice = $quantity * $book->price;

        Transaction::create([
            'book_id' => $book->id,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ]);

        $book->update(['stock' => $book->stock - $quantity]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil dibeli.');
    }

}
