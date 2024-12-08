<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tokobuku</title>
    @vite('resources/css/app.css')
</head>

<body>
    </div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-400">
        <div class="flex justify-between mt-8">
            <h1 class="font-bold text-4xl">Daftar Buku</h1>
            <button class="bg-green-700 rounded-xl p-3 px-5 mr-7 text-white">Tambah Buku</button>
        </div>
        <div class="mt-6">
            @csrf
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">ID Buku</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Judul Buku</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Cover Buku</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Pengarang</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Kategori</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Stok</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Harga</div>
                        </th>
                        <th class="px-4 py-2">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $item)
                        <tr>
                            <td class="border border-green-900 px-4 py-2 w-48">{{ $item->id }}</td>
                            <td class="border border-green-900 px-4 py-2 w-48">{{ $item->judul }}</td>
                            <td class="border border-green-900 px-4 py-2 w-48">{{ $item->cover }}</td>
                            <td class="border border-green-900 px-4 py-2 w-48">{{ $item->pengarang }}</td>
                            <td class="border border-green-900 px-4 py-2 w-48">{{ $item->kategori }}</td>
                            <td class="border border-green-900 px-4 py-2 w-48">{{ $item->stock }}</td>
                            <td class="border border-green-900 px-4 py-2 w-48">{{ $item->harga }}</td>
                            <td class="border border-green-900 px-4 py-2 justify-center flex flex-col">
                                <button class="bg-blue-600 rounded-xl p-3 px-5 text-white mb-3">Edit</button>
                                <button class="bg-red-600 rounded-xl p-3 px-3 text-white">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- {{ $item->judul }} --}}

</body>

</html>
