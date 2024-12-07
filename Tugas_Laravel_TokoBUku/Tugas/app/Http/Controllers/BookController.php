<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public  function create()
    {
        return view ('books.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $fileName);
            $data['image'] = $fileName;
        }
    

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');

       
    }

    public function index()
    {
        $books = Book::all(); 
        return view('books.index', compact('books'));
    }

    // public function edit($id) {
       
    //     $book = Book::findOrFail($id); 

    //     return view('edit', compact('book'));
    // }

    // public function update (Request $request, $id) {
    //     $request->validate([
    //         'price' => 'required|numeric|min:0', 
    //         'stock' => 'required|integer|min:0',
    //     ]);

    //     $book =Book::fineOrFail($id);
    //     $book->update([
    //         'price' => $request->price,
    //         'stock' => $request->stock,

    //     ]);
    // }

    public function edit($id)
    {
       
        $book = Book::find($id);
    
        if (!$book) {
       
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
    
        
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'price' => 'required|numeric|min:0', 
            'stock' => 'required|integer|min:0', 
        ]);
    
        
        $book = Book::find($id);
    
        if (!$book) {
          
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
    
        
        $book->price = $request->input('price');
        $book->stock = $request->input('stock');
    
        $book->save();
    
    
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
{
   
    $book = Book::find($id);

    if (!$book) {
       
        return redirect()->route('books.index')->with('error', 'Book not found');
    }

    
    $book->delete();

    
    return redirect()->route('books.index')->with('success', 'Book deleted successfully');
}

        
}
