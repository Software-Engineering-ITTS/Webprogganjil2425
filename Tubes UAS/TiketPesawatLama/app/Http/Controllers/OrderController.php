<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function create($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        return view('user.create-order', compact('ticket'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
        ]);

        $order = Order::create([
            'ticket_id' => $request->ticket_id,
            'user_id' => auth()->user()->id,
            'name' => $validated['name'],
            'gender' => $validated['gender'],
            'nationality' => $validated['nationality'],
            'dob' => $validated['dob'],
            'phone' => $validated['phone'],
            'order_date' => now(),
        ]);

        return redirect()->route('user.history')->with('success', 'Pemesanan berhasil');
    }

    public function showOrdersHistory()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('user.history', compact('orders'));
    }


    public function adminTransactions()
    {
        $transactions = Order::with(['ticket'])
            ->get();

        return view('admin.transactions', compact('transactions'));
    }

    public function viewTicket($orderId)
    {
        $orders = Order::where('user_id', Auth::id())->get();

        if ($orders->isEmpty()) {
            return redirect()->route('user.history')->with('error', 'Anda belum memesan tiket!');
        }

        return view('user.view-ticket', compact('orders'));
    }


    public function checkIn($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->check_in_status = 'checked_in';
        $order->check_in_date = now();
        $order->save();

        return redirect()->route('user.orders.history')->with('success', 'Check-in berhasil');
    }
}
