<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Transaksi</title>
    @vite('resources/css/app.css')
    <script>
        // JavaScript untuk menghitung subtotal
        function calculateSubtotal() {
            // Ambil nilai dari input jumlah_buku dan harga_buku
            var jumlahBuku = parseFloat(document.getElementById('jumlah_buku').value);
            var hargaBuku = parseFloat(document.getElementById('harga_buku').value);
            
            // Hitung subtotal jika kedua nilai ada dan valid
            if (!isNaN(jumlahBuku) && !isNaN(hargaBuku)) {
                var subtotal = jumlahBuku * hargaBuku;
                document.getElementById('subtotal').value = subtotal.toFixed(2);  // Mengatur dua desimal
            } else {
                document.getElementById('subtotal').value = 0;
            }
        }

        // Menambahkan event listener untuk setiap perubahan pada jumlah_buku dan harga_buku
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('jumlah_buku').addEventListener('input', calculateSubtotal);
            document.getElementById('harga_buku').addEventListener('input', calculateSubtotal);
        });
    </script>
</head>

<body>
@include('components.navbar')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Detail Transaksi</h1>

    <div class="container mx-auto p-6 bg-white rounded-md shadow-md border border-gray-300 mt-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Edit Detail Transaksi</h1>

        <!-- Form to edit the Detail Transaksi -->
        <form action="{{ route ('detailTransaksi.update', $detail_transaksis->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Transaksi selection -->
            <div class="mb-4">
                <label for="id_transaksi" class="block text-gray-700 font-medium">Pilih Transaksi</label>
                <select name="id_transaksi" id="id_transaksi" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                    <option value="">Pilih Transaksi</option>
                    @foreach ($transaksis as $transaksi)
                        <option value="{{ $transaksi->id }}" {{ $transaksi->id == $detail_transaksis->id_transaksi ? 'selected' : '' }}>{{ $transaksi->nama_pelanggan }} - {{ $transaksi->tanggal_transaksi }}</option>
                    @endforeach
                </select>
                @error('id_transaksi')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buku selection -->
            <div class="mb-4">
                <label for="id_buku" class="block text-gray-700 font-medium">Pilih Buku</label>
                <select name="id_buku" id="id_buku" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                    <option value="">Pilih Buku</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ $buku->id == $detail_transaksis->id_buku ? 'selected' : '' }}>{{ $buku->judul }}</option>
                    @endforeach
                </select>
                @error('id_buku')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jumlah Buku -->
            <div class="mb-4">
                <label for="jumlah_buku" class="block text-gray-700 font-medium">Jumlah Buku</label>
                <input type="number" name="jumlah_buku" id="jumlah_buku" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" value="{{ old('jumlah_buku', $detail_transaksis->jumlah_buku) }}" required>
                @error('jumlah_buku')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Harga Buku -->
            <div class="mb-4">
                <label for="harga_buku" class="block text-gray-700 font-medium">Harga Buku</label>
                <input type="number" name="harga_buku" id="harga_buku" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" value="{{ old('harga_buku', $detail_transaksis->harga_buku) }}" required>
                @error('harga_buku')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Subtotal -->
            <div class="mb-4">
                <label for="subtotal" class="block text-gray-700 font-medium">Subtotal</label>
                <input type="number" name="subtotal" id="subtotal" class="mt-1 block w-full rounded-md border border-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm" value="{{ old('subtotal', $detail_transaksis->subtotal) }}" required readonly>
                @error('subtotal')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Perbarui Detail Transaksi</button>
        </form>
    </div>
</div>

</body>
