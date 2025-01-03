@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6 text-center">Edit Produk</h1>
    
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2">Nama Produk:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Deskripsi:</label>
            <textarea id="description" name="description" class="w-full px-4 py-2 border rounded-lg" rows="3" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-bold mb-2">Harga:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-bold mb-2">Gambar:</label>
            <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk" class="mt-2" width="100">
            @endif
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
    </form>
</div>
@endsection
