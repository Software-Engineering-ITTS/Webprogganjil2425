<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Daftar Buku</h1>

        <div class="mb-4">
            <a href="{{ route('transaksi.create') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">
                Kembali ke Halaman Utama
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-200 bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-4 text-left border border-gray-300">ID</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Judul</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Pembuat</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Deskripsi</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Harga</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Gambar Buku</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Stok</th>
                        <th class="py-3 px-4 text-left border border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @forelse ($books as $book)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 border border-gray-300">{{ $book->id }}</td>
                            <td class="py-3 px-4 border border-gray-300">{{ $book->title }}</td>
                            <td class="py-3 px-4 border border-gray-300">{{ $book->author }}</td>
                            <td class="py-3 px-4 border border-gray-300">{{ $book->description }}</td>
                            <td class="py-3 px-4 border border-gray-300">{{ number_format($book->price, 2) }}</td>
                            <td class="py-3 px-4 border border-gray-300">
                                @if ($book->image)
                                    <img src="{{ asset('storage/images/' . $book->image) }}" alt="{{ $book->title }}" class="w-20 h-20 object-cover rounded">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 border border-gray-300">{{ $book->stock }}</td>
                            <td class="py-3 px-4 border border-gray-300 space-y-2">
                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="block px-4 py-2 bg-blue-500 text-white rounded-lg text-center hover:bg-blue-600 focus:ring focus:ring-blue-300">
                                    Edit
                                </a>

                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this book?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:ring focus:ring-red-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-3 px-4 text-center text-gray-500">No books available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
