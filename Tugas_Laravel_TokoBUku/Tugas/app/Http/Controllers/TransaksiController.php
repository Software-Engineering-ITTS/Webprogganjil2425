<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\transaksi;

class TransaksiController extends Controller
{
    
      public function index()
      {
          $transaksi = Transaksi::with('book')->get();
          return view('Transaksi.index', compact('transaksi'));
      }
  
     
      public function create()
      {
          $books = Book::all(); 
          return view('Transaksi.create', compact('books'));
      }
  
     
      public function store(Request $request)
      {
          $request->validate([
              'book_id' => 'required|exists:books,id',
              'pembeli' => 'required|string|max:255',
              'quantity' => 'required|integer|min:1',
          ]);
  
          
          $book = Book::find($request->book_id);
  
          
          if ($request->quantity > $book->stock) {
              return redirect()->back()->withErrors('Stock is insufficient.');
          }
  
          
          $totalPrice = $request->quantity * $book->price;
  
          
          $book->stock -= $request->quantity;
          $book->save();
  
          
          Transaksi::create([
              'book_id' => $book->id,
              'pembeli' => $request->pembeli,
              'quantity' => $request->quantity,
              'total_price' => $totalPrice,
          ]);
  
          return redirect()->route('transaksi.index')->with('success', 'Transaction created successfully.');
      }
}
