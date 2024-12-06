<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    @vite('resources/css/app2.css')
</head>
<body>
<form method="POST" action="{{ route('toko-buku.update', $buku->ID_buku) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-4">
        <label for="nama_buku" class="block text-sm font-medium text-gray-700">Nama Buku</label>
        <input type="text" id="nama_buku" name="nama_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ $buku->nama_buku }}">
    </div>
    
    <div class="mb-4">
        <label for="status_buku" class="block text-sm font-medium text-gray-700">Status Buku</label>
        <select id="status_buku" name="status_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="1" {{ $buku->status_buku ? 'selected' : '' }}>Tersedia</option>
            <option value="0" {{ !$buku->status_buku ? 'selected' : '' }}>Tidak Tersedia</option>
        </select>
    </div>
    
    <div class="mb-4">
        <label for="kuantitas_buku" class="block text-sm font-medium text-gray-700">Kuantitas Buku</label>
        <input type="number" id="kuantitas_buku" name="kuantitas_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ $buku->kuantitas_buku }}">
    </div>
    
    <div class="mb-4">
        <label for="harga_buku" class="block text-sm font-medium text-gray-700">Harga Buku</label>
        <input type="number" id="harga_buku" name="harga_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ $buku->harga_buku }}">
    </div>
    
    <div class="mb-4">
        <label for="file_gambar" class="block text-sm font-medium text-gray-700">Gambar Buku</label>
        <input type="file" id="file_gambar" name="file_gambar" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @if ($buku->file_gambar && $buku->file_gambar !== 'default.png')
        <img src="{{ asset('storage/' . $buku->file_gambar) }}" alt="Gambar Buku" class="mt-2" width="150">
        @endif
    </div>

    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Submit</button>
</form>
</body>
</html>
