<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        Book::all();
        $categories = Category::all();
        return view('tambahbuku', compact('categories'));  
    }

    public function show(){
        $books = Book::with('category')->get();
        return view('viewbuku', compact('books'));  
    }

    public function store(Request $request){
        $valdata = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'tanggal_terbit' => 'required|date',
            'cover_buku' => 'required',
            'pdf' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');
            $filename = $request->cover_buku . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('cover',$filename, 'public');
            $valdata['cover_buku'] = $filePath;
        } else {
            $isnull = 'null';
            $valdata['cover_buku'] = $isnull;
        }


        Book::create($valdata);
        return redirect('/');
    }

    public function edit($id){
        $books = Book::find($id);
        $categories = Category::all();
        return view('editbuku', compact('books','categories'));
    }

    public function update(Request $request, $id){
        $valdata = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'tanggal_terbit' => 'required|date',
            'cover_buku' => 'required',
            'pdf' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        if ($request->hasFile('cover_buku')) {
            $file = $request->file('cover_buku');
            $filename = $request->cover_buku . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('cover',$filename, 'public');
            $valdata['cover_buku'] = $filePath;
        } else {
            $isnull = 'null';
            $valdata['cover_buku'] = $isnull;
        }

        $books = Book::find($id);
        $books->update($valdata);
        return redirect('/');
    }

    public function destroy($id){
        $books = Book::findOrFail($id);
        $books->delete();

        return redirect('/');

    }

    
}
