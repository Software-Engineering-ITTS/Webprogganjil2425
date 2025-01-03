<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $products = Product::where('status', 'aktif')->get();

        if ($products->isEmpty()) {
            return redirect()->route('customer.order.create')
                ->withErrors(['product' => 'Tidak ada produk yang tersedia untuk dipesan.']);
        }

        return view('customer.order', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $product = Product::find($validatedData['product_id']);

        if ($product->stock < $validatedData['quantity']) {
            return back()->withErrors(['quantity' => 'Jumlah pesanan melebihi stok yang tersedia.']);
        }

        $totalPrice = $product->price * $validatedData['quantity'];

        $order = Order::create([
            'product_id' => $validatedData['product_id'],
            'customer_id' => auth()->id(),
            'customer_name' => $validatedData['customer_name'],
            'customer_email' => $validatedData['customer_email'],
            'address' => $validatedData['address'],
            'phone_number' => $validatedData['phone_number'],
            'quantity' => $validatedData['quantity'],
            'total_price' => $totalPrice,
            'status' => 'Pending',
        ]);

        $product->stock -= $validatedData['quantity'];
        $product->save();

        return redirect()->route('customer.order.create')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function track(Request $request)
    {
        $order = null;

        if ($request->has('order_id')) {
            $order = Order::with('product')->where('id', $request->order_id)->first();
        }

        if (auth()->user()->role === 'admin') {
            return view('admin.track-order', compact('order'));
        }

        return view('customer.track-order', compact('order'));
    }

    public function index()
    {
        $orders = Order::with('product')->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return back()->withErrors(['order' => 'Pesanan tidak ditemukan.']);
        }

        $product = $order->product;
        $product->stock += $order->quantity;
        $product->save();

        $order->status = 'Canceled';
        $order->save();

        return redirect()->route('customer.orders.index')
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }

    public function updateStatus(Request $request, $orderId)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat mengubah status pesanan.');
        }

        $validatedData = $request->validate([
            'status' => 'required|string|in:Pending,Diproses,Dikirim,Selesai,Dibatalkan',
        ]);

        $order = Order::findOrFail($orderId);
        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
