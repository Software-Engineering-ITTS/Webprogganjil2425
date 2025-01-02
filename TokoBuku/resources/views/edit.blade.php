<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cyan-400 min-h-screen p-6">
<div class="container mx-auto max-w-lg mt-10 bg-cyan-200 shadow-lg rounded-lg p-8">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">EditBuku</h1>
    <form action="{{ route('bookss.update', $bookss->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Judul -->
        <div>
            <label for="judul" class="block text-gray-1000 font-medium mb-2">Judul</label>
            <input 
                type="text" 
                name="Judul" 
                id="judul" 
                value="{{ $bookss->Judul }}" 
                class=" p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan judul buku" 
                required>
        </div>
        
        <!-- Penulis -->
        <div>
            <label for="penulis" class="block text-gray-1000 font-medium mb-2">Penulis</label>
            <input 
                type="text" 
                name="Penulis" 
                id="penulis" 
                value="{{ $bookss->Penulis }}" 
                class=" p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama penulis" 
                required>
        </div>
        
        <!-- Tahun Terbit -->
        <div>
            <label for="tahun_terbit" class="block text-gray-1000 font-medium mb-2">Tahun Terbit</label>
            <input 
                type="number" 
                name="Tahun_terbit" 
                id="tahun_terbit" 
                value="{{ $bookss->Tahun_terbit }}" 
                class=" p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan tahun terbit" 
                required>
        </div>
        
        <!-- Stock -->
        <div>
            <label for="stock" class="block text-gray-1000 font-medium mb-2">Stock</label>
            <input 
                type="number" 
                name="Stock" 
                id="stock" 
                value="{{ $bookss->Stock }}" 
                class=" p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan jumlah stock" 
                required>
        </div>
        
        <!-- Harga -->
        <div>
            <label for="harga" class="block text-gray-1000 font-medium mb-2">Harga</label>
            <input 
                type="number" 
                name="Harga" 
                id="harga" 
                value="{{ $bookss->Harga }}" 
                class=" p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan harga buku" 
                required>
        </div>
        
        <!-- Cover -->
        <div>
            <label for="cover" class="block text-gray-1000 font-medium mb-2">Cover</label>
            <input 
                type="file" 
                name="Cover" 
                id="cover" 
                class="p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            @if ($bookss->Cover)
            <div class="mt-4">
                <img 
                    src="{{ asset('storage/' . $bookss->Cover) }}" 
                    alt="Cover" 
                    class="rounded-md shadow-md w-40 h-40 object-cover mx-auto">
            </div>
            @endif
        </div>
        
        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full bg-sky-600 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-300">
            Update
        </button>
    </form>
</div>
</body>
</html>
