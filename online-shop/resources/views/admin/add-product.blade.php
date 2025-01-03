@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6 text-center">Tambah/Edit Produk</h1>
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-bold mb-2">Nama Produk:</label>
        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="description" class="block text-sm font-bold mb-2">Deskripsi:</label>
        <textarea id="description" name="description" class="w-full px-4 py-2 border rounded-lg" rows="4"></textarea>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-sm font-bold mb-2">Harga:</label>
        <input type="number" id="price" name="price" class="w-full px-4 py-2 border rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="image" class="block text-sm font-bold mb-2">Gambar:</label>
        <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg">
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
    <a href="{{ route('admin.product.index') }}" class="ml-2 text-gray-500 hover:underline">Batal</a>
</form>


</div>
@endsection
