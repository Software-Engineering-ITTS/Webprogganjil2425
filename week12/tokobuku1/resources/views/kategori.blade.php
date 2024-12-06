<!-- resources/views/kategori.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Kategori</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.navbar')

    <div class="container mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (isset($kategoris)) <!-- Untuk tampilan daftar kategori -->
            <h1 class="text-2xl font-bold mb-6">Daftar Kategori</h1>
            <a href="{{ route('kategori.create') }}" class="btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4">Tambah Kategori</a>
            <table class="table-auto border-collapse border border-gray-300 w-full bg-white shadow-md rounded-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Nama Genre</th>
                        <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $kategori)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $kategori->nama_genre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $kategori->deskripsi }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else <!-- Untuk form tambah/edit -->
            <h1 class="text-2xl font-bold mb-6">
                {{ isset($kategoris) ? 'Edit Kategori' : 'Tambah Kategori' }}
            </h1>
            <form action="{{ isset($kategoris) ? route('kategori.update', $kategoris->id) : route('kategori.store') }}" method="POST">
                @csrf
                @if (isset($kategoris)) @method('PUT') @endif
                <div class="mb-4">
                    <label for="nama_genre" class="block text-sm font-medium text-gray-700">Nama Genre</label>
                    <input type="text" name="nama_genre" id="nama_genre" value="{{ old('nama_genre', $kategoris->nama_genre ?? '') }}" class="border border-gray-300 rounded-md p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="border border-gray-300 rounded-md p-2 w-full">{{ old('deskripsi', $kategoris->deskripsi ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Batal</a>
            </form>
        @endif
    </div>
</body>
</html>
