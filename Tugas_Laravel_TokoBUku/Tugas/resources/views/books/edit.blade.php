@extends('layout.app')

@section('title', 'Edit Stock and Price')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Stok dan Harga</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="price" class="block text-gray-700 font-medium">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $book->price) }}" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="stock" class="block text-gray-700 font-medium">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('books.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">
                    Kembali
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
