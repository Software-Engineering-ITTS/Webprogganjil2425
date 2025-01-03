<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function index(Request $request)
    {
        $order = null;

        if ($request->has('order_id')) {
            $order = Order::with('product')->where('id', $request->order_id)->first();
        }

        return view('customer.track-order', compact('order'));
    }

    public function track(Request $request)
    {
        $orders = null;
        $isAdmin = auth()->user()->role === 'admin';

        if ($isAdmin) {
            $orders = Order::with('product')
                ->when($request->has('order_id'), function ($query) use ($request) {
                    $query->where('id', $request->order_id);
                })
                ->get();
        } else {
            $orders = Order::with('product')
                ->where('customer_email', auth()->user()->email)
                ->when($request->has('order_id'), function ($query) use ($request) {
                    $query->where('id', $request->order_id);
                })
                ->get();
        }

        return view('customer.track-order', compact('orders', 'isAdmin'));
    }
}
