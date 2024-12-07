<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold text-center mb-6">Edit Buku</h1>
        <div class="bg-white shadow-md rounded-lg p-6 max-w-xl mx-auto">
            <form method="POST" action="/toko/{{ $data->id }}" class="space-y-4">
                @method('put')
                @csrf
                
                <div>
                    <label for="Judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="Judul" id="Judul" value="{{ $data->judul }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                
                <div>
                    <label for="Penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" name="Penulis" id="Penulis" value="{{ $data->Penulis }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>

                <div>
                    <label for="Harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="text" name="Harga" id="Harga" value="{{ $data->Harga }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                
                <div class="mt-4">
                    <img src="/img/{{ $data->img }}" alt="Cover Buku" class="w-32 h-32 rounded-md mx-auto">
                </div>
                
                <div>
                    <label for="img" class="block text-sm font-medium text-gray-700">Cover Baru</label>
                    <input type="file" name="img" id="img" 
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                
                <div>
                    <button type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-sm">
                        Submit
                    </button>
                </div>
            </form>
            
            <a href="/" class="block text-center mt-6 text-blue-500 hover:underline">Balik</a>
        </div>
    </div>
</body>
</html>
