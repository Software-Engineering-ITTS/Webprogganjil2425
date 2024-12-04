<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use DB;
use App\Models\TransactionList;

class TransactionController extends Controller
{
    // to transactional page which is also homepage
    public function hometransaction(){
        
            $users = User::paginate(5); 
            $books = Book::where('stock', '>', 0)->paginate(5); 
        
            return view('home.index', [
                'users' => $users,
                'books' => $books,
            ]);
        }

    // to list transaction page
    public function index()
    {
        $transactions = Transaction::paginate(6); 
        
        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }

    

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'books' => 'required|array',
            'books.*.id' => 'required|exists:books,id',
            'books.*.quantity' => 'required|integer|min:1',
        ]);
    
        DB::transaction(function () use ($request) {
            $transaction = Transaction::create([
                'user_id' => $request->user_id,
                'total_amount' => 0, 
            ]);
    
            $totalAmount = 0;
    
            // Loop di setiap buku yg dipilih
            // untuk buat setiap item transaction_list
            foreach ($request->books as $bookData) {
                $book = Book::findOrFail($bookData['id']);
                $subtotal = $book->harga * $bookData['quantity'];
    
                TransactionList::create([
                    'transaction_id' => $transaction->id,
                    'book_id' => $book->id,
                    'quantity' => $bookData['quantity'],
                    'total_price' => $subtotal,
                ]);
    
                $book->update([
                    'stock' => $book->stock - $bookData['quantity'],
                ]);
    
                $totalAmount += $subtotal;
            }
    
            $transaction->update([
                'total_amount' => $totalAmount,
            ]);
        });
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Dibuat');
    }
}
