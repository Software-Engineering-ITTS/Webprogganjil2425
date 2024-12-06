<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-6">
        <a href="/create" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Tambah Data
        </a>
        <a href="/" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Lihat Buku
        </a>
        <h2 class="text-2xl font-bold mt-4">Show Transaksi</h2>
        <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">JUDUL</th>
                    <th class="border border-gray-300 px-4 py-2">NAMA PEMBELI</th>
                    <th class="border border-gray-300 px-4 py-2">NOMOR TELEPON</th>
                    <th class="border border-gray-300 px-4 py-2">STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
                <tr class="text-center odd:bg-white even:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $items->judul }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->Nama }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->NomorTelepon }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->Status }}</td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
