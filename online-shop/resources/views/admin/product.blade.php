@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Daftar Produk</h2>
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.product.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tambah Produk
        </a>
        <!-- Form Pencarian -->
        <form action="{{ route('admin.product.index') }}" method="GET" class="flex">
            <input 
                type="text" 
                name="search" 
                placeholder="Cari produk..." 
                value="{{ request('search') }}" 
                class="border rounded-l px-4 py-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600">
                Search
            </button>
        </form>
    </div>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nama Produk</th>
                <th class="px-4 py-2 border">Deskripsi</th>
                <th class="px-4 py-2 border">Harga</th>
                <th class="px-4 py-2 border">Gambar</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td class="px-4 py-2 border text-center">{{ $product->id }}</td>
                <td class="px-4 py-2 border">{{ $product->name }}</td>
                <td class="px-4 py-2 border">{{ $product->description }}</td>
                <td class="px-4 py-2 border text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="px-4 py-2 border text-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk" class="w-16 h-16 object-cover mx-auto">
                    @else
                        <span class="text-gray-500">Tidak ada gambar</span>
                    @endif
                </td>
                <td class="px-4 py-2 border text-center">
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    |
                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-2 border text-center text-gray-500">Tidak ada produk ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
