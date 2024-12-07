<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('book')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }
}

