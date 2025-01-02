<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Data</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen bg-gray-100 text-gray-800">
    <div class="p-8 max-w-4xl mx-auto">
        <form action="/filterdata" method="GET" class="bg-red-700 text-white p-6 rounded-lg shadow-md space-y-4">
            <h2 class="text-xl font-bold mb-4">Filter Data</h2>
            <div>
                <label for="bulan" class="block text-sm font-medium">Pilih Bulan:</label>
                <select name="bulan" id="bulan" class="w-full mt-1 px-3 py-2 bg-red-100 text-black border border-red-300 rounded">
                    <option value="">Semua</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <label for="tanggal" class="block text-sm font-medium">Pilih Tanggal:</label>
                <select name="tanggal" id="tanggal" class="w-full mt-1 px-3 py-2 bg-red-100 text-black border border-red-300 rounded">
                    <option value="">Semua</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="w-full py-2 bg-red-800 text-white font-bold rounded hover:bg-black">
                Filter
            </button>
        </form>

        <br> <p class="text-xl font-semibold mb-4">Data Pemasukkan</p>
        <table class="w-full border-collapse border border-red-300">
            <thead>
                <tr class="bg-red-700 text-white">
                    <th class="border border-red-300 px-4 py-2">Nama Barang</th>
                    <th class="border border-red-300 px-4 py-2">Jumlah Barang</th>
                    <th class="border border-red-300 px-4 py-2">Nominal</th>
                    <th class="border border-red-300 px-4 py-2">Status</th>
                    <th class="border border-red-300 px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody class="bg-red-100 text-black">
                @foreach ($laporan as $data)
                <tr>
                    <td class="border border-red-300 px-4 py-2">{{ $data->Nama_Barang }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $data->Jumlah_Barang }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $data->Nominal }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $data->Status }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $data->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="text-xl font-semibold mb-4">Data Pengeluaran</p>
        <table class="w-full border-collapse border border-red-300">
            <thead>
                <tr class="bg-red-700 text-white">
                    <th class="border border-red-300 px-4 py-2">Nama Barang</th>
                    <th class="border border-red-300 px-4 py-2">Jumlah Barang</th>
                    <th class="border border-red-300 px-4 py-2">Nominal</th>
                    <th class="border border-red-300 px-4 py-2">Status</th>
                    <th class="border border-red-300 px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody class="bg-red-100 text-black">
                @foreach ($pengeluaran as $item)
                <tr>
                    <td class="border border-red-300 px-4 py-2">{{ $item->Nama_Barang }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $item->Jumlah_Barang }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $item->Nominal }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $item->Status }}</td>
                    <td class="border border-red-300 px-4 py-2">{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="/menu" class="text-red-700 hover:text-black font-bold">Kembali</a>
        </div>
    </div>
</body>
</html>
