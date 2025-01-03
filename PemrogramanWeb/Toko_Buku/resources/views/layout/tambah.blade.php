{{-- <!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-400">
        <h1 class="font-bold text-4xl mb-6">Tambah Buku</h1>
        <form method="POST" action="{{ route('buku.store') }}">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" id="judul" name="judul" class="border-gray-300 rounded-md shadow-sm w-full" value="{{ old('judul') }}">
                @error('judul')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="border-gray-300 rounded-md shadow-sm w-full" value="{{ old('kategori') }}">
                @error('kategori')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" class="border-gray-300 rounded-md shadow-sm w-full" value="{{ old('pengarang') }}">
                @error('pengarang')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover Buku</label>
                <input type="text" id="cover" name="cover" class="border-gray-300 rounded-md shadow-sm w-full" value="{{ old('cover') }}">
                @error('cover')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white rounded p-3 px-4">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html> --}}
