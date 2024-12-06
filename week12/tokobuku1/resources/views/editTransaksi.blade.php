<!doctype html>
<html>

<head>
    <title>Edit Kategori</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    @include('components.navbar')

    @section('content')
    <div class="container mx-auto p-6">
        <h1>Edit Transaksi</h1>

        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="bg-white p-6 rounded-md shadow-md border border-gray-300">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nama_pelanggan" class="block text-gray-700 font-medium">Nama Pelanggan</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', $transaksi->nama_pelanggan) }}" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                </div>
                <div>
                    <label for="total_harga" class="block text-gray-700 font-medium">Total Harga</label>
                    <input type="number" id="total_harga" name="total_harga" value="{{ old('total_harga', $transaksi->total_harga) }}" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                </div>
                <div>
                    <label for="pembayaran" class="block text-gray-700 font-medium">Pembayaran</label>
                    <select id="pembayaran" name="pembayaran" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                        <option value="cash" {{ old('pembayaran', $transaksi->pembayaran) == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="e-money" {{ old('pembayaran', $transaksi->pembayaran) == 'e-money' ? 'selected' : '' }}>E-Money</option>
                    </select>
                </div>
                <div>
                    <label for="tanggal_transaksi" class="block text-gray-700 font-medium">Tanggal Transaksi</label>
                    <input type="date" id="tanggal_transaksi" name="tanggal_transaksi"
                    value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi"
                        class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        required>
                </div>
            </div>
            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Update Transaksi</button>
        </form>
    </div>
    

</body>

</html>