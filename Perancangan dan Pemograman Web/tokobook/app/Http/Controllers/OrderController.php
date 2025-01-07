<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('books')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function store()
    {
        DB::transaction(function () {
            $cartItems = auth()->user()->cart()->with('book')->get();
            
            $total = $cartItems->sum(function ($item) {
                return $item->book->price * $item->quantity;
            });

            $order = auth()->user()->orders()->create([
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            foreach ($cartItems as $item) {
                $order->books()->attach($item->book_id, [
                    'quantity' => $item->quantity,
                    'price' => $item->book->price
                ]);
            }

            auth()->user()->cart()->delete();
        });

        return redirect()->route('orders.index')->with('success', 'Order placed successfully');
    }
}