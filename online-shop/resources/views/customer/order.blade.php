@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6 text-center">Form Pemesanan</h1>
    <form action="{{ route('customer.order.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="product_id" class="block text-sm font-bold mb-2">Pilih Produk:</label>
            <select id="product_id" name="product_id" class="w-full px-4 py-2 border rounded-lg" required>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="customer_name" class="block text-sm font-bold mb-2">Nama Pemesan:</label>
            <input type="text" id="customer_name" name="customer_name" placeholder="Masukkan Nama Anda" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="customer_email" class="block text-sm font-bold mb-2">Email:</label>
            <input type="email" id="customer_email" name="customer_email" placeholder="Masukkan Email Anda" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-bold mb-2">Alamat:</label>
            <textarea id="address" name="address" placeholder="Masukkan Alamat Anda" class="w-full px-4 py-2 border rounded-lg" rows="3" required></textarea>
        </div>
        <div class="mb-4">
            <label for="phone_number" class="block text-sm font-bold mb-2">Nomor Telepon:</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="Masukkan Nomor Telepon Anda" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-bold mb-2">Jumlah:</label>
            <input type="number" id="quantity" name="quantity" placeholder="Masukkan Jumlah" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="notes" class="block text-sm font-bold mb-2">Catatan Tambahan:</label>
            <textarea id="notes" name="notes" placeholder="Masukkan Catatan (opsional)" class="w-full px-4 py-2 border rounded-lg" rows="3"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Pesan Sekarang</button>
    </form>
</div>
@endsection
