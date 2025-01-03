@extends('layouts.app')

@section('content')
<div class="bg-gray-200 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">Sistem Pemesanan Online</h1>
        <nav class="flex space-x-4">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-500">Home</a>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('admin.product.index') }}" class="text-gray-700 hover:text-blue-500">Daftar Produk</a>
                <a href="{{ route('admin.track') }}" class="text-gray-700 hover:text-blue-500">Pelacakan Pesanan</a>
            @elseif(auth()->check() && auth()->user()->role === 'customer')
                <a href="{{ route('customer.order.create') }}" class="text-gray-700 hover:text-blue-500">Form Pemesanan</a>
            <a href="{{ route('customer.track') }}" class="text-gray-700 hover:text-blue-500">Pelacakan Pesanan</a>
            @endif
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-red-500 hover:text-red-700">Logout</a>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>

<div class="container mx-auto mt-4">
    <h1 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}</h1>
    <p>Ini adalah halaman utama setelah login.</p>
</div>
@endsection
