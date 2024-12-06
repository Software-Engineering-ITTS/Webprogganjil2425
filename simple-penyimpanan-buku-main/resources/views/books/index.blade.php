@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4">Daftar Buku</h2>

    <!-- Tombol untuk menambah buku baru -->
    <div class="mb-4">
        <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Buku Baru
        </a>
    </div>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 text-left">Judul</th>
                <th class="py-2 px-4 text-left">Penulis</th>
                <th class="py-2 px-4 text-left">Deskripsi</th>
                <th class="py-2 px-4 text-left">Stok</th>
                <th class="py-2 px-4 text-left">Status</th>
                <th class="py-2 px-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td class="py-2 px-4">{{ $book->title }}</td>
                    <td class="py-2 px-4">{{ $book->author }}</td>
                    <td class="py-2 px-4">{{ Str::limit($book->description, 50) }}</td>
                    <td class="py-2 px-4">{{ $book->stock }}</td>
                    <td class="py-2 px-4">
                        @if ($book->loan)
                            <span class="text-red-500">Dipinjam</span>
                        @else
                            <span class="text-green-500">Tersedia</span>
                        @endif
                    </td>
                    <td class="py-2 px-4">
                        @if ($book->loan)
                            <button class="bg-gray-400 text-white p-2 rounded" disabled>Dipinjam</button>
                        @else
                            <!-- Tombol Edit Buku -->
                            <a href="{{ route('books.edit', $book->id) }}"
                                class="bg-yellow-500 text-white p-2 rounded ml-2 hover:bg-yellow-700">
                                Edit
                            </a>

                            <!-- Tombol Hapus Buku -->
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection