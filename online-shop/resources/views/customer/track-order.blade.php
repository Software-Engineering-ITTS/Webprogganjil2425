@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Pelacakan Pesanan (Customer)</h1>

    <form action="{{ route('customer.track') }}" method="GET" class="mb-6">
        <label for="order_id" class="block text-sm font-bold">Masukkan ID Pesanan:</label>
        <input type="text" id="order_id" name="order_id" placeholder="ID Pesanan" 
               class="w-full p-2 border rounded mb-4" value="{{ request('order_id') }}">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Lacak Pesanan</button>
    </form>

    @if ($order)
        <h2 class="text-lg font-bold">Detail Pesanan</h2>
        <p><strong>ID Pesanan:</strong> {{ $order->id }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
        <p><strong>Produk:</strong> {{ $order->product->name }}</p>
        <p><strong>Jumlah:</strong> {{ $order->quantity }}</p>
    @else
        <p>Pesanan tidak ditemukan.</p>
    @endif
</div>
@endsection
