<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Tambahkan fitur pencarian
        $query = Book::query();
        
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        // Tambahkan sorting
        $books = $query->paginate(12);
        
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        // Tambahkan related books
        $relatedBooks = Book::where('author', $book->author)
                            ->where('id', '!=', $book->id)
                            ->limit(4)
                            ->get();
        
        return view('books.show', compact('book', 'relatedBooks'));
    }

    // Tambahkan metode create
    public function create()
    {
        return view('books.create');
    }

    // Tambahkan metode store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'published_year' => 'integer|nullable'
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil ditambahkan');
    }
}