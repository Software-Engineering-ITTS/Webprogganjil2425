<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gaji Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-green-700 to-green-500 text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="#" class="text-xl font-bold hover:text-green-300">Manajemen Gaji</a>
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-green-300">Dashboard</a></li>
                <li><a href="/karyawan" class="hover:text-green-300">Data Karyawan</a></li>
                <li><a href="/presensi" class="hover:text-green-300">Presensi</a></li>
                <li><a href="/gaji" class="hover:text-green-300">Data Gaji</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto mt-10 px-4">
        <h1 class="text-3xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-green-400 mb-8 text-center">Data Gaji Karyawan</h1>

        <!-- Form untuk Tambah Gaji -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200 mb-8">
            <form action="{{ route('gaji.create') }}" method="POST">
                @csrf
                <h2 class="text-lg font-semibold text-green-700 mb-4 text-center">Tambah Gaji Karyawan</h2>

                <!-- Pilihan Nama Karyawan -->
                <div class="mb-4">
                    <label for="karyawan_id" class="block text-gray-700 font-medium">Nama Karyawan:</label>
                    <select name="karyawan_id" id="karyawan_id" required class="w-full p-2 border border-green-300 rounded-lg focus:ring focus:ring-green-500 focus:outline-none">
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Data Lainnya -->
                <div class="mb-4">
                    <label for="total_hadir" class="block text-gray-700 font-medium">Total Hadir:</label>
                    <input type="number" name="total_hadir" id="total_hadir" required class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="total_alpha" class="block text-gray-700 font-medium">Total Alpha:</label>
                    <input type="number" name="total_alpha" id="total_alpha" required class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="gaji_pokok" class="block text-gray-700 font-medium">Gaji Pokok:</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" required class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="potongan" class="block text-gray-700 font-medium">Potongan (Jika Ada):</label>
                    <input type="number" name="potongan" id="potongan" class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="tunjangan" class="block text-gray-700 font-medium">Tunjangan (Jika Ada):</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="bonus" class="block text-gray-700 font-medium">Bonus (Jika Ada):</label>
                    <input type="number" name="bonus" id="bonus" class="w-full p-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-400 text-white py-2 rounded-lg transition hover:bg-gradient-to-l">Tambah</button>
            </form>
        </div>

        <!-- Daftar Gaji Karyawan -->
        <h2 class="text-2xl font-semibold text-green-700 mb-4">Daftar Gaji Karyawan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="px-4 py-2 text-left">Nama Karyawan</th>
                        <th class="px-4 py-2 text-left">Total Hadir</th>
                        <th class="px-4 py-2 text-left">Total Alpha</th>
                        <th class="px-4 py-2 text-left">Gaji Pokok</th>
                        <th class="px-4 py-2 text-left">Tunjangan</th>
                        <th class="px-4 py-2 text-left">Bonus</th>
                        <th class="px-4 py-2 text-left">Potongan</th>
                        <th class="px-4 py-2 text-left">Gaji Bersih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gajis as $gaji)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $gaji->karyawan->nama }}</td>
                            <td class="px-4 py-2">{{ $gaji->total_hadir }}</td>
                            <td class="px-4 py-2">{{ $gaji->total_alpha }}</td>
                            <td class="px-4 py-2">{{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ number_format($gaji->bonus, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ number_format($gaji->gaji_bersih, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
