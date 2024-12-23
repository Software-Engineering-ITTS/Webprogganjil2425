<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Transaksi;
use Illuminate\Routing\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::whereHas('user', function($query){
            $query->whereNull('deleted_at'); 
        })
        ->with(['transaksiLists' => function ($query) {
            $query->whereHas('barang', function ($query) {
                $query->whereNull('deleted_at');
            });
        }])
        ->paginate(6); 

        return view('penjualan.index', [
            'transactions' => $transaksis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
