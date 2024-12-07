<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah Buku</h1>

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-gray-700 font-medium">Judul:</label>
                <input type="text" name="title" id="title" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="author" class="block text-gray-700 font-medium">Pembuat:</label>
                <input type="text" name="author" id="author" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium">Deskripsi:</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"></textarea>
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-medium">Harga:</label>
                <input type="number" name="price" id="price" step="0.01" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="stock" class="block text-gray-700 font-medium">Stok:</label>
                <input type="number" name="stock" id="stock" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="image" class="block text-gray-700 font-medium">Gambar:</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('books.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">
                    Kembali
                </a>
                <button type="reset"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">
                    Reset
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>

</html>
