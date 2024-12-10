<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $book->stock
        ]);

        // Cek stok
        if ($book->stock < $request->quantity) {
            return back()->with('error', 'Stock not enough!');
        }

        // Hitung total harga
        $total_price = $book->price * $request->quantity;

        // Buat transaksi
        Transaction::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'quantity' => $request->quantity,
            'total_price' => $total_price
        ]);

        // Kurangi stok
        $book->update([
            'stock' => $book->stock - $request->quantity
        ]);

        return redirect()->route('books.index')->with('success', 'Transaction successful!');
    }

    public function index()
    {
        $transactions = Transaction::with(['book', 'user'])
            ->when(auth()->user()->role === 'user', function($query) {
                return $query->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }
}