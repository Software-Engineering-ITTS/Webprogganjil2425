<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    @include('components.navbar')

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Buku</h1>

        <form action="{{ route('Buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="judul">Judul</label>
                <input class="input" type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required>
            </div>
            <div>
                <label for="penulis">Penulis</label>
                <input class="input" type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
            </div>
            <div>
                <label for="cover">Cover</label>
                <input class="input" type="file" name="cover" accept="image/*">
                @if ($buku->cover)
                <img src="{{ Storage::url($buku->cover) }}" alt="Cover {{ $buku->judul }}" width="100">
                @endif
            </div>
            <div>
                <label for="harga">Harga</label>
                <input class="input" type="number" step="0.01" name="harga" value="{{ old('harga', $buku->harga) }}" required>
            </div>
            <div>
                <label for="stok">Stok</label>
                <input class="input" type="number" name="stok" value="{{ old('stok', $buku->stok) }}" required>
            </div>
            <div>
                <label for="id_kategori" class="block text-sm font-medium text-gray-700" for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select class="input border border-gray-300 rounded-md p-2 w-full" name="id_kategori" id="id_kategori" required>
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == $buku->id_kategori ? 'selected' : '' }}>
                        {{ $kategori->nama_genre }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button class="btn bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600" type="submit">Simpan Perubahan</button>
        </form>