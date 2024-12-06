<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>keranjang zoro's bookstore </title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex justify-center items-center gap-4">
                <img src="https://ih1.redbubble.net/image.5278499885.1380/flat,750x,075,f-pad,750x1000,f8f8f8.u1.jpg"
                    alt="Logo Zoro's Bookstore" class="h-8 w-8 object-cover rounded-full">
                <h1 class="text-2xl font-bold text-green-600">zoro's bookstore</h1>
            </div>
            <nav>
                <ul class="flex space-x-6 text-green-700">
                    <li><a href="app.blade.php" class="hover:text-blue-600">Home</a></li>
                    <li><a href="book.blade.php" class="hover:text-blue-600">Shop</a></li>
                    <li><a href="#" class="hover:text-blue-600">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <main class="bg-gradient-to-r from-green-600 to-white-400 container mx-auto">
        <br>
        <h2 class=" text-center text-2xl font-bold text-green-700 mb-4">KERANJANG</h2>



        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Keranjang -->
        <div class="bg-white shadow rounded-lg p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-green-100 text-green-700">
                        <th class="p-3">Judul Buku</th>
                        <th class="p-3">Harga</th>
                        <th class="p-3">Jumlah</th>
                        <th class="p-3">Subtotal</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($keranjang as $index => $item)
                        <tr>
                            <td class="p-3">{{ $item['book_title'] }}</td>
                            <td class="p-3">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="p-3">
                                <form action="{{ route('keranjang.update', $index) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                        class="border rounded p-2 w-16">
                                </form>
                            </td>
                            <td class="p-3">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </td>
                            <td class="p-3 flex justify-center items-center gap-2">
                                <form action="{{ route('keranjang.update', $index) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="ml-2 bg-green-500 text-white px-3 py-1 rounded hover:bg-blue-700">Update</button>
                                </form>
                                <form action="{{ route('keranjang.destroy', $index) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-500">Keranjang kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="text-right mt-4">
                <h3 class="text-xl font-bold text-green-700">Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
            </div>
        </div>

        <!-- Tambah Buku -->
        <div class="mt-8 bg-white shadow rounded-lg p-4">
            <h2 class="text-xl font-bold text-green-700 mb-4">Tambah Buku</h2>
            <form action="{{ route('keranjang.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block font-semibold text-green-600">Judul Buku:</label>
                    <input type="text" name="book_title" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-green-600">Harga:</label>
                    <input type="number" name="price" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-green-600">Jumlah:</label>
                    <input type="number" name="quantity" class="w-full border p-2 rounded" required>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-600">
                    Tambah ke Keranjang
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 zoro's bookstore. all rights reserved.</p>
        </div>
    </footer>

</body>

</html>
