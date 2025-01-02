<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::all(); 
        $books = Book::all(); 
        return view('transactioncreate', compact('transactions', 'books'));
    }

    public function show(){
        $transactions= Transaction::with('book')->get();
        return view('viewtransaction', compact('transactions'));  
    }

   

    public function store(Request $request){
        $valdata = $request->validate([
            'book_id' => 'required',
            'tanggal_beli' => 'required',
            'status' => 'required',            
        ]);

        
        Transaction::create($valdata);
        dd($valdata);
        return redirect('/');

    }

    public function edit($id){
        $books = Book::all();
        $transactions =  Transaction::findOrFail($id);
        return view('transactionedit', compact('transactions', 'books'));

    }


    public function update(Request $request, $id){
        $valdata = $request->validate([
             'book_id' => 'required',
            'tanggal_beli' => 'required',
            'status' => 'required',
        ]);

        $transactions =  Transaction::findOrFail($id);
        $transactions->update($valdata);

        return redirect('/');

    }

    public function destroy($id){
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect('Transaction');

    }
}
