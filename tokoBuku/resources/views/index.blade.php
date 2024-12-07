<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <a href="/create" class="text-blue-500 underline">Tambah Data</a>
        <a href="/hasil" class="text-blue-500 underline">Hasil Transaksi</a>
        
        <h2 class="text-2xl font-bold mt-6 mb-4">Show Data</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2 border">IDBuku</th>
                    <th class="px-4 py-2 border">COVER</th>
                    <th class="px-4 py-2 border">JUDUL</th>
                    <th class="px-4 py-2 border">PENULIS</th>
                    <th class="px-4 py-2 border">HARGA</th>
                    <th class="px-4 py-2 border">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $items->id }}</td>
                    <td class="px-4 py-2 border">
                        <img width="100" src="/img/{{ $items->img }}">
                    </td>
                    <td class="px-4 py-2 border">{{ $items->judul }}</td>
                    <td class="px-4 py-2 border">{{ $items->Penulis }}</td>
                    <td class="px-4 py-2 border">{{ $items->Harga }}</td>
                    <td class="px-4 py-2 border space-x-2">
                        <a href="/transaksi/{{ $items->id }}/edit" class="text-green-500">Beli</a>
                        <a href="/toko/{{ $items->id }}/edit" class="text-blue-500">Edit</a>
                        <form method="POST" action="/toko/{{ $items->id }}" class="inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
