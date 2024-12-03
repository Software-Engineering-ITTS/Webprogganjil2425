<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(6); 
        
        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }
}
