<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminController extends Controller
{
    public function showPurchaseHistory()
    {
        $orders = Order::with(['customer', 'aircraft'])->get();

        return view('admin.history', compact('orders'));
    }
}
