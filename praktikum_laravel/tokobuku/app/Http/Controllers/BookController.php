<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use File;
use DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(6); // Fetch 10 records per page

        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request->get('judul'));

        $val_data = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',        
            'stock' => 'required',
            'harga' => 'required',
        ]);


        if ($val_data->fails()) {
            var_dump($val_data->fails());
            return redirect()->route('books.create');
            // return route('books.create');
        }


        if ($request->hasFile('cover')) {
            $image = $request->file('cover'); 
        
            $filename = $image->hashName();
            $path = $image->store('public/uploads');
        

            $file = new File;
            $file->name = $filename;
            $file->path = $path;
        }

        $save = Book::Create([
            'judul' => $request->get('judul'),
            'penulis' => $request->get('penulis'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'stock' => $request->get('stock'),
            'harga' => $request->get('harga'),
            'cover' => $filename,
        ]);

        if ($save) {
            return redirect()->route('books.index');
            // return view('books.index');
        } else {
            // var_dump($save);
            return redirect()->route('books.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
