<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Barang;
use DB;
use Illuminate\Http\Request;
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
        ->with(['transactionLists' => function ($query) {
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
        
        $barangs = Barang::where('stock', '>', 0)->paginate(5); 
    
        return view('penjualan.form', [
            'barangs' => $barangs,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'pelanggan' => 'required',
            'cart' => 'required|array|min:1',
        ]);
    
        $pelanggan = $validatedData['pelanggan'];
        $cart = $validatedData['cart'];
    
        DB::beginTransaction();
    
        try {
    
            $transaction = Transaksi::create([
                'nama_pelanggan' => $pelanggan,
                'total_transaksi' => collect($cart)->sum(function ($item) {
                    return $item['price'] * $item['quantity'];
                }),
                'user_id' => auth()->id(),
            ]);
    
            foreach ($cart as $item) {
                $transaction->transactionLists()->create([
                    'barang_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
    
                $barang = Barang::find($item['id']);
                $barang->stock -= $item['quantity']; /// buat ngurangin stock di barang
                $barang->save();
            }
    
    
            DB::commit();
    
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = Transaksi::with(['transactionLists.barang'])->findOrFail($id);

        return response()->json($transaction);
    }

   
}
