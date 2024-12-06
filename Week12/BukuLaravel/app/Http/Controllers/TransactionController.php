<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Buku;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));
    }

    public function show()
    {
        $bukus = Buku::all();
        $transactions = Transaction::all();
        return view('transaction.index', compact('bukus', 'transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bukus = Buku::all();
        Transaction::all();
        return view('transaction.create', compact('bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valdata = $request->validate([
            'buku_id' => 'required',
            'transaction_date' => 'required',
            'status' => 'required',
        ]);

        Transaction::create($valdata);
        return redirect()->route('transaction.store')->with('success', 'Transaction berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bukus = Buku::all();
        $transaction = Transaction::findOrFail($id);
        return view('transaction.edit', compact('transaction', 'bukus'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id' => 'required',
            'transaction_date' => 'required',
            'status' => 'required',
        ]);

        $transactions = Transaction::findOrFail($id);
        $transactions->update([
            'buku_id' => $request->buku_id,
            'transaction_date' => $request->transaction_date,
            'status' => $request->status,
        ]);
        return redirect()->route('transaction.update', $id)->with('success', 'Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('TokoBuku.index')->with('success', 'Buku berhasil diupdate!');
    }
}
