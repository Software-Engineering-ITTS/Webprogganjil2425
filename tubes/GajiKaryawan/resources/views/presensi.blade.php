<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Karyawan</title>
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
        <h1 class="text-4xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-green-400 mb-8 text-center">Presensi Karyawan</h1>

        <!-- Tambah Presensi -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
            <form action="{{ route('presensi.store') }}" method="POST">
                @csrf
                <h2 class="text-xl font-semibold text-green-600 mb-4 text-center">Tambah Presensi</h2>

                <div class="mb-4">
                    <label for="karyawan_id" class="block text-gray-700 font-medium">Nama Karyawan:</label>
                    <select name="karyawan_id" id="karyawan_id" required class="w-full p-2 border border-green-300 rounded-lg focus:ring focus:ring-green-500 focus:outline-none">
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tanggal" class="block text-gray-700 font-medium">Tanggal:</label>
                    <input type="date" name="tanggal" id="tanggal" required class="w-full p-2 border border-green-300 rounded-lg focus:ring focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-medium">Status:</label>
                    <select name="status" id="status" required class="w-full p-2 border border-green-300 rounded-lg focus:ring focus:ring-green-500 focus:outline-none">
                        <option value="Hadir">Hadir</option>
                        <option value="Alpha">Alpha</option>
                        <option value="Sakit">Sakit</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-400 text-white px-4 py-2 rounded-lg hover:bg-gradient-to-l transition duration-300">Tambah</button>
            </form>
        </div>

        <!-- List Presensi -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-green-600 mb-4">Riwayat Presensi</h2>
            <div class="overflow-x-auto bg-white rounded-lg shadow-md border border-gray-200">
                <table class="w-full table-auto">
                    <thead class="bg-gradient-to-r from-green-500 to-green-400 text-white text-sm font-medium">
                        <tr>
                            <th class="py-3 px-4">Nama</th>
                            <th class="py-3 px-4">Tanggal</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensis as $presensi)
                            <tr class="hover:bg-green-50">
                                <td class="py-3 px-4 border-b border-gray-200 text-gray-700">{{ $presensi->karyawan->nama }}</td>
                                <td class="py-3 px-4 border-b border-gray-200 text-gray-700">{{ $presensi->tanggal }}</td>
                                <td class="py-3 px-4 border-b border-gray-200 text-gray-700">{{ $presensi->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>

