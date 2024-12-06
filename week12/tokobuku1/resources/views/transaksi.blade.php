<!DOCTYPE html>
<html>

<head>
    <title>Kelola Transaksi</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.navbar')

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Daftar Transaksi</h1>

        <form action="{{ route('transaksi.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md border border-gray-300">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nama_pelanggan" class="block text-gray-700 font-medium">Nama Pelanggan</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                        class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        required>
                </div>
                <div>
                    <label for="total_harga" class="block text-gray-700 font-medium">Total Harga</label>
                    <input type="number" id="total_harga" name="total_harga"
                        class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        required>
                </div>
                <div>
                    <label for="pembayaran" class="block text-gray-700 font-medium">Pembayaran</label>
                    <select id="pembayaran" name="pembayaran"
                        class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        required>
                        <option value="cash">Cash</option>
                        <option value="e-money">E-Money</option>
                    </select>
                </div>
                <div>
                    <label for="tanggal_transaksi" class="block text-gray-700 font-medium">Tanggal Transaksi</label>
                    <input type="date" id="tanggal_transaksi" name="tanggal_transaksi"
                        class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        required>
                </div>
            </div>
            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Simpan Transaksi</button>
        </form>
    

        <table class="w-full border-collapse border border-gray-300 bg-white shadow-md rounded-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Nama Pelanggan</th>
                    <th class="border border-gray-300 px-4 py-2">Total Harga</th>
                    <th class="border border-gray-300 px-4 py-2">Pembayaran</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal Transaksi</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->nama_pelanggan }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->pembayaran }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->tanggal_transaksi }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>