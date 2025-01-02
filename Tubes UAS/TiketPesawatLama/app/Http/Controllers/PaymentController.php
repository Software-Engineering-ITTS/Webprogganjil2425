<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay($orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->payment_status === 'paid') {
            return redirect()->route('user.orders.history')->with('error', 'Tiket ini sudah dibayar.');
        }

        return view('user.payment', compact('order'));
    }

    public function processPayment(Request $request, $orderId)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:16',
            'card_expiry' => 'required|string|max:5',
            'card_cvc' => 'required|string|max:3',
        ]);

        $order = Order::findOrFail($orderId);

        if ($order->payment_status === 'paid') {
            return redirect()->route('user.history')->with('error', 'Tiket ini sudah dibayar.');
        }

        $order->payment_status = 'paid'; 
        $order->payment_date = now();
        $order->save();

        return redirect()->route('user.history')->with('success', 'Pembayaran berhasil');
    }

    public function viewTransactions()
    {
        $transactions = Order::with('ticket')->get();
        return view('admin.transactions', compact('transactions'));
    }
}


