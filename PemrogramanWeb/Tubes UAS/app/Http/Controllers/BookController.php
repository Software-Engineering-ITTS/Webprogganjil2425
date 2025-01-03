<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books,title',
            'cover_image' => 'required|mimes:jpg,png,pdf|max:2048',
            'author' => 'required',
            'isbn' => 'required',
            'quantity' => 'required',
        ]);

        //ambil parameter
        $file = $request->file('cover_image');

        //rename
        $nama_file = time() . "_" . $file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './img/';
        $file->move($tujuan_upload, $nama_file);

        Book::create([
            'title' => $request->title,
            'cover_image' => $nama_file,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'quantity' => $request->quantity,
        ]);

        return redirect('/admin/dashboard')->with('cover_image', $nama_file);
    }
}
