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
        <a href="/riwayat" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Lihat Transaksi
        </a>
        <h2 class="text-2xl font-bold mt-4">Show Data</h2>
        <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">COVER</th>
                    <th class="border border-gray-300 px-4 py-2">JUDUL</th>
                    <th class="border border-gray-300 px-4 py-2">PENULIS</th>
                    <th class="border border-gray-300 px-4 py-2">HARGA</th>
                    <th class="border border-gray-300 px-4 py-2">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
                <tr class="text-center odd:bg-white even:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">
                        <img width="100" src="img/{{ $items->img }}">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->judul }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->Penulis }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->Harga }}</td>
                    <td class="border border-gray-300 px-4 py-2 space-x-2">
                        <a href="/transaksi/{{ $items->id }}/edit" 
                           class="bg-green-500 text-white py-1 px-2 rounded hover:bg-green-600">
                            Beli
                        </a>
                        <a href="/toko/{{ $items->id }}/edit" 
                           class="bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">
                            Edit
                        </a>
                        <form method="POST" action="/toko/{{ $items->id }}" class="inline">
                            @method('delete')
                            @csrf
                            <button type="submit" 
                                    class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
