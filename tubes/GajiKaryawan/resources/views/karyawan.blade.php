<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-green-700 to-green-500 text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="#" class="text-xl font-bold hover:text-green-300">Manajemen Karyawan</a>
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-green-300">Dashboard</a></li>
                <li><a href="/karyawan" class="hover:text-green-300">Data Karyawan</a></li>
                <li><a href="/presensi" class="hover:text-green-300">Presensi</a></li>
                <li><a href="/gaji" class="hover:text-green-300">Gaji</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto mt-10 px-4">
        <h1 class="text-3xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-green-400 mb-8 text-center">Data Karyawan</h1>

        <!-- Form - Add Karyawan (Centered) -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
        <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf
                <h2 class="text-lg font-semibold text-green-700 mb-4 text-center">Tambah Karyawan</h2>

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-medium">Nama:</label>
                    <input type="text" name="nama" id="nama" required class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="jabatan" class="block text-gray-700 font-medium">Jabatan:</label>
                    <input type="text" name="jabatan" id="jabatan" required class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="gaji_pokok" class="block text-gray-700 font-medium">Gaji Pokok:</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" required class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="tunjangan" class="block text-gray-700 font-medium">Tunjangan:</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-400 text-white py-2 rounded-lg transition hover:bg-gradient-to-l">Tambah</button>
            </form>
        </div>

        <!-- List Karyawan -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-green-700 mb-4">Daftar Karyawan</h2>
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead class="bg-gradient-to-r from-green-600 to-green-400 text-white">
                        <tr>
                            <th class="p-3 text-left">Nama</th>
                            <th class="p-3 text-left">Jabatan</th>
                            <th class="p-3 text-left">Gaji Pokok</th>
                            <th class="p-3 text-left">Tunjangan</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawans as $karyawan)
                            <tr class="border-b border-gray-200 hover:bg-green-50">
                                <td class="p-3">{{ $karyawan->nama }}</td>
                                <td class="p-3">{{ $karyawan->jabatan }}</td>
                                <td class="p-3">Rp {{ number_format($karyawan->gaji_pokok, 0, ',', '.') }}</td>
                                <td class="p-3">Rp {{ number_format($karyawan->tunjangan, 0, ',', '.') }}</td>
                                <td class="p-3 flex space-x-2">
                                    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="bg-gradient-to-r from-green-600 to-green-400 text-white px-3 py-1 rounded-lg transition">Edit</a>
                                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg transition">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
