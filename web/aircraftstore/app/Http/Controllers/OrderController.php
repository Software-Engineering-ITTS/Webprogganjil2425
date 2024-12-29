<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Aircraft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'aircraft_id' => 'required|exists:aircraft,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $customer = Customer::where('user_id', Auth::id())->first();
        if (!$customer) {
            return redirect()->back()->with('error', 'You need to register as a customer first!');
        }

        $aircraft = Aircraft::findOrFail($request->aircraft_id);

        $order = Order::create([
            'customer_id' => $customer->id,
            'aircraft_id' => $aircraft->id,
            'quantity' => $request->quantity,
            'total_price' => $aircraft->price * $request->quantity,
        ]);

        return redirect()->route('orders.index')->with('success', 'Purchase successful!');
    }

    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();

        if (!$customer) {
            return redirect()->route('customer.register')->with('error', 'You need to register as a customer first!');
        }

        $orders = Order::where('customer_id', $customer->id)->with('aircraft')->get();

        return view('orders.index', compact('orders'));
    }
}
