@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4">Edit Buku</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}"
                class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}"
                class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $book->stock) }}"
                class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="description" name="description"
                class="mt-1 block w-full p-2 border border-gray-300 rounded">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Update
                Buku</button>
        </div>
    </form>
</div>
@endsection