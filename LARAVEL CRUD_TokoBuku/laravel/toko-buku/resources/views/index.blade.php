<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Toko Buku</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Toko Buku</h1>
        
        Form Toko Buku
        <form method="POST" action="{{ route('toko-buku.store') }}" class="bg-white p-6 rounded shadow-md mb-6" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama_buku" class="block text-sm font-medium text-gray-700">Nama Buku</label>
                <input type="text" id="nama_buku" name="nama_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="status_buku" class="block text-sm font-medium text-gray-700">Status Buku</label>
                <select id="status_buku" name="status_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="kuantitas_buku" class="block text-sm font-medium text-gray-700">Kuantitas Buku</label>
                <input type="number" id="kuantitas_buku" name="kuantitas_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_terbit_buku" class="block text-sm font-medium text-gray-700">Tanggal Terbit</label>
                <input type="date" id="tanggal_terbit_buku" name="tanggal_terbit_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="file_gambar" class="block text-sm font-medium text-gray-700">File Gambar</label>
                <input type="file" id="file_gambar" name="file_gambar" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="harga_buku" class="block text-sm font-medium text-gray-700">Harga Buku</label>
                <input type="number" id="harga_buku" name="harga_buku" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Submit</button>
        </form>

        <!-- Tabel Buku -->
        <table class="table-auto w-full bg-white rounded shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama Buku</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Kuantitas</th>
                    <th class="px-4 py-2">Tanggal Terbit</th>
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->nama_buku }}</td>
                    <td class="px-4 py-2">{{ $item->status_buku ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                    <td class="px-4 py-2">{{ $item->kuantitas_buku }}</td>
                    <td class="px-4 py-2">{{ $item->tanggal_terbit_buku }}</td>
                    <td class="px-4 py-2">{{ $item->file_gambar }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($item->harga_buku, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 flex gap-2">
                    <form action="{{ route('toko-buku.update', $item->ID_buku) }}" method="PUT" onsubmit="return confirm('Yakin ingin mengedit?')">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">UPDATE</button>
                        </form>
                        <form action="{{ route('toko-buku.destroy', $item->ID_buku) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">DELETE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
