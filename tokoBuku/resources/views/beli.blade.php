<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Buku</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Beli Buku</h1>
        @foreach ($data as $items)
        <div class="mb-8">
            <img 
                class="w-32 h-32 object-cover rounded-md" 
                src="/img/{{ $items->img }}" 
                alt="Cover Buku">
            <div class="text-gray-700">Nama Buku ={{ $items->judul }}</div>
            <div class="text-gray-600">Nama Penulis ={{ $items->Penulis }}</div>
            <div class="text-gray-800 font-bold">Harga Buku ={{ $items->Harga }}</div>
        </div>
        <form method="POST" action="/transaksi" class="space-y-4">
            @csrf
            <div>
                <label for="Nama" class="text-gray-700">Nama</label>
                <input 
                    type="text" 
                    name="Nama" 
                    id="Nama" 
                    class="w-full border rounded-md">
            </div>
            <div>
                <label for="NomorTelepon" class="text-gray-700">Nomor Telepon</label>
                <input 
                    type="text" 
                    name="NomorTelepon" 
                    id="NomorTelepon" 
                    class="w-full border rounded-md">
            </div>
            <input type="hidden" name="status" value="Berhasil">
            <input type="hidden" name="toko_id" value="{{ $items->id }}">
            <div class="flex justify-between items-center">
                <button 
                    type="submit" 
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700">
                    Submit
                </button>
                <a 
                    href="/" 
                    class="text-indigo-600 hover:underline text-sm font-medium">
                    Balik
                </a>
            </div>
        </form>
        @endforeach
    </div>
</body>
</html>
