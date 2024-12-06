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
        <h1 class="text-2xl font-bold mb-6">Tambah Buku</h1>

        <form action="/Buku" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-md">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input class="input border border-gray-300 rounded-md p-2 w-full" type="text" name="judul" id="judul" value="{{ old('judul') }}" required>
            </div>
            <div class="mb-4">
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input class="input border border-gray-300 rounded-md p-2 w-full" type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" required>
            </div>
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover</label>
                <input class="input border border-gray-300 rounded-md p-2 w-full" type="file" name="cover" id="cover" accept="image/*">
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input class="input border border-gray-300 rounded-md p-2 w-full" type="number" step="0.01" name="harga" id="harga" value="{{ old('harga') }}" required>
            </div>
            <div class="mb-4">
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                <input class="input border border-gray-300 rounded-md p-2 w-full" type="number" name="stok" id="stok" value="{{ old('stok') }}" required>
            </div>
            <div class="mb-4">
                <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select class="input border border-gray-300 rounded-md p-2 w-full" name="id_kategori" id="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_genre }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-4">
                <button class="btn bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600" type="submit">Simpan</button>
                <button class="btn bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600" type="reset">Reset</button>
            </div>
        </form>

        <h1 class="text-2xl font-bold mt-12 mb-6">Data Buku</h1>
        <table class="table-auto border-collapse border border-gray-300 w-full bg-white shadow-md rounded-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Judul</th>
                    <th class="border border-gray-300 px-4 py-2">Penulis</th>
                    <th class="border border-gray-300 px-4 py-2">Cover</th>
                    <th class="border border-gray-300 px-4 py-2">Harga</th>
                    <th class="border border-gray-300 px-4 py-2">Stok</th>
                    <th class="border border-gray-300 px-4 py-2">Kategori</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $buku->judul }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $buku->penulis }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($buku->cover)
                        <img src="{{ Storage::url($buku->cover) }}" alt="Cover {{ $buku->judul }}" class="w-16 h-auto mx-auto">
                        @else
                        Tidak ada cover
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($buku->harga, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $buku->stok }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $buku->kategori->nama_genre ?? 'N/A' }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex gap-2">
                        <a href="{{ route('Buku.edit', $buku->id) }}" class="btn bg-yellow-500 text-white py-1 px-4 rounded-md hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('Buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-red-500 text-white py-1 px-4 rounded-md hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
