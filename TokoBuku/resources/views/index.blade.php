<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cyan-400">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <h1 class="text-4xl font-bold text-gray-1000 text-center mb-8">Toko Buku</h1>
        
        <!-- Form and Image Section -->
        <div class="bg-cyan-200 shadow-md rounded-md p-6 mb-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Form Section -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Input Buku</h2>
                <form action="{{ route('bookss.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="hidden" name="id" id="book-id">
                    <div>
                        <label for="judul" class="block text-gray-1000 font-medium">Judul</label>
                        <input 
                            type="text" 
                            name="Judul" 
                            id="judul" 
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            placeholder="Masukkan judul buku" 
                            required>
                    </div>
                    <div>
                        <label for="penulis" class="block text-gray-1000 font-medium">Penulis</label>
                        <input 
                            type="text" 
                            name="Penulis" 
                            id="penulis" 
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            placeholder="Masukkan nama penulis" 
                            required>
                    </div>
                    <div>
                        <label for="tahun_terbit" class="block text-gray-1000 font-medium">Tahun Terbit</label>
                        <input 
                            type="number" 
                            name="Tahun_terbit" 
                            id="tahun_terbit" 
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            placeholder="Masukkan tahun terbit" 
                            required>
                    </div>
                    <div>
                        <label for="stock" class="block text-gray-1000 font-medium">Stock</label>
                        <input 
                            type="number" 
                            name="Stock" 
                            id="stock" 
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            placeholder="Masukkan jumlah stock" 
                            required>
                    </div>
                    <div>
                        <label for="harga" class="block text-gray-1000 font-medium">Harga</label>
                        <input 
                            type="number" 
                            name="Harga" 
                            id="harga" 
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            placeholder="Masukkan harga buku" 
                            required>
                    </div>
                    <div>
                        <label for="cover" class="block text-gray-1000 font-medium">Cover</label>
                        <input 
                            type="file" 
                            name="Cover" 
                            id="cover" 
                            class="w-full p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Submit
                    </button>
                </form>
            </div>

            <!-- Image Section -->
    <div class="flex justify-center items-center">
    <img src="https://img.freepik.com/premium-vector/bookshop-facade-flat-style-people-are-reading-choosing-books-used-bookshop-small-business-store-front-design_6280-294.jpg?ga=GA1.1.874669446.1730125110&semt=ais_hybrid" 
        alt="" 
        class="w-full h-full rounded-md shadow-lg object-cover"
    />
</div>

        </div>

        <!-- Table to Display Books -->
        <div class="bg-cyan-200 shadow-md rounded-md p-6">
            <h2 class="text-2xl font-semibold text-sky-800 mb-4">List Buku</h2>
            <table class="w-full border border-gray-200 rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="bg-cyan-100 border p-2 text-left text-sm font-medium text-slate-950">#</th>
                        <th class="bg-cyan-100 border p-2 text-left text-sm font-medium text-slate-950">Judul</th>
                        <th class="bg-cyan-100 border p-2 text-left text-sm font-medium text-slate-950">Penulis</th>
                        <th class="bg-cyan-100 border p-2 text-center text-sm font-medium text-slate-950">Tahun Terbit</th>
                        <th class="bg-cyan-100 border p-2 text-center text-sm font-medium text-slate-950">Stock</th>
                        <th class="bg-cyan-100 border p-2 text-right text-sm font-medium text-slate-950">Harga</th>
                        <th class="bg-cyan-100 border p-2 text-center text-sm font-medium text-slate-950">Cover</th>
                        <th class="bg-cyan-100 border p-2 text-center text-sm font-medium text-slate-950">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookss as $book)
                    <tr class="hover:bg-gray-50">
                        <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $book->Judul }}</td>
                        <td class="border p-2">{{ $book->Penulis }}</td>
                        <td class="border p-2 text-center">{{ $book->Tahun_terbit }}</td>
                        <td class="border p-2 text-center">{{ $book->Stock }}</td>
                        <td class="border p-2 text-right">Rp{{ number_format($book->Harga, 0, ',', '.') }}</td>
                        <td class="border p-2 text-center">
                            @if ($book->Cover)
                            <img src="{{ asset('storage/' . $book->Cover) }}" alt="Cover" class="w-12 h-12 object-cover mx-auto rounded-md shadow-sm">
                            @else
                            <span class="text-gray-400 ">No Cover</span>
                            @endif
                        </td>
                        <td class="border p-2 text-center space-x-2">
                            <a href="{{ route('bookss.edit', $book->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</a>
                            <a href="{{ route('bookss.pembelian', $book->id) }}" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Beli</a>
                            <form action="{{ route('bookss.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Yakin untuk menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
