<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-5 px-4">
        <h1 class="text-center text-3xl font-semibold mb-5">Daftar Pembelian Buku</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-success mb-4 bg-green-500 text-white p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pembelian Buku -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-4">
            <div class="text-xl font-semibold mb-4">Form Pembelian Buku</div>
            <form action="{{ route('pembelian.store') }}" method="POST" id="pembelianForm">
                @csrf
                <div class="mb-4">
                    <label for="nama_pembeli" class="block text-sm font-medium text-gray-700">Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" id="nama_pembeli" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_membeli" class="block text-sm font-medium text-gray-700">Tanggal Membeli</label>
                    <input type="date" name="tanggal_membeli" id="tanggal_membeli" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="ID_buku" class="block text-sm font-medium text-gray-700">Buku</label>
                    <select name="ID_buku" id="ID_buku" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="" disabled selected>Pilih Buku</option>
                        @foreach ($bukus as $buku)
                            <option value="{{ $buku->ID_buku }}">{{ $buku->nama_buku }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Tambah Pembelian</button>
            </form>
        </div>

        <!-- Tabel Daftar Pembelian -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-4">
            <div class="text-xl font-semibold mb-4">Daftar Pembelian</div>
            <table class="min-w-full table-auto" id="pembelianTable">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Nama Pembeli</th>
                        <th class="px-4 py-2 text-left">Tanggal Membeli</th>
                        <th class="px-4 py-2 text-left">Buku</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembelians as $index => $pembelian)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $pembelian->nama_pembeli }}</td>
                            <td class="px-4 py-2">{{ $pembelian->tanggal_membeli }}</td>
                            <td class="px-4 py-2">{{ $pembelian->buku->nama_buku ?? 'Tidak Diketahui' }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Buttons for Print and Reset -->
        <div class="text-center mt-4">
            <button onclick="printReceipt()" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Cetak Struk</button>
            <button onclick="resetTable()" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Reset Tabel</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.js"></script>

    <script>
        // Function to print the receipt
        function printReceipt() {
            var printContent = document.getElementById('pembelianTable').outerHTML;
            var printWindow = window.open('', '', 'height=500, width=800');
            printWindow.document.write('<html><head><title>Cetak Struk Pembelian</title></head><body>');
            printWindow.document.write('<h1>Struk Pembelian Buku</h1>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }

        // Function to reset the table
        function resetTable() {
            var tableBody = document.querySelector('#pembelianTable tbody');
            tableBody.innerHTML = ''; // Clear all rows in the table
        }
    </script>

</body>
</html>
