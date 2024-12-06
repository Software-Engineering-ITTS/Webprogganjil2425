<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Buku Baru</h1>
        <form method="POST" action="/toko" class="space-y-4">
            @csrf
            <div>
                <label for="Judul" class="font-medium text-gray-700">Judul</label>
                <input 
                    type="text" 
                    name="Judul" 
                    id="Judul" 
                    class="w-full border rounded-md">
            </div>
            <div>
                <label for="Penulis" class="font-medium text-gray-700">Penulis</label>
                <input 
                    type="text" 
                    name="Penulis" 
                    id="Penulis" 
                    class="w-full border rounded-md">
            </div>
            <div>
                <label for="Harga" class="font-medium text-gray-700">Harga</label>
                <input 
                    type="text" 
                    name="Harga" 
                    id="Harga" 
                    class="w-full border rounded-md">
            </div>
            <div>
                <label for="img" class="font-medium text-gray-700">Cover</label>
                <input 
                    type="file" 
                    name="img" 
                    id="img" 
                    class="w-full text-sm text-gray-500 file        :mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>
            <div class="flex justify-between items-center">
                <button 
                    type="submit" 
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700">
                    Submit
                </button>
                <a 
                    href="/" 
                    class="text-indigo-600 hover:underline text-sm font-medium">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>
