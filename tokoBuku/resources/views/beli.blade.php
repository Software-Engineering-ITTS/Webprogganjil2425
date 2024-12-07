<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Form Buku Baru</h1>
        @foreach ($data as $items)
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            
            <div class="flex items-center space-x-4">
                <img width="100" class="rounded-md" src="/img/{{ $items->img }}" alt="Cover Buku">
                <div>
                    <div class="text-lg font-semibold">{{ $items->judul }}</div>
                    <div class="text-gray-600">{{ $items->Penulis }}</div>
                    <div class="text-green-600 font-bold">Rp {{ number_format($items->Harga, 0, ',', '.') }}</div>
                </div>
            </div>
            
            
            <form method="POST" action="/transaksi" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label for="Nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="Nama" id="Nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="NomorTelepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="NomorTelepon" id="NomorTelepon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <input type="hidden" name="status" value="Berhasil">
                <input type="hidden" name="toko_id" value="{{ $items->id }}">
                
                <button type="submit" class="w-full bg-blue-500  text-white py-2 px-4 rounded-md">
                    Submit
                </button>
            </form>
        </div>
        @endforeach
        
        <a href="/" class="block text-center mt-6 text-blue-500">
            Balik
        </a>
    </div>
</body>
</html>
