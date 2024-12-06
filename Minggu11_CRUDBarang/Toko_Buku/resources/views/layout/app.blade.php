<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>

    </div>

    <div class="p-6 sm:px-20 bg-white border-b border-gray-400">
        <div class="flex justify-between mt-8">
            <h1 class="font-bold text-4xl">Daftar Buku</h1>
            <button class="bg-green-700 rounded-xl p-3 px-5 text-white">Tambah Buku</button>
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
                            <div class="flex items-center justify-center">Kategori</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Pengarang</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Cover Buku</div>
                        </th>
                        <th class="px-4 py-2">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($bukus as $buku) --}}
                    <tr>
                        <td class="border border-green-900 px-4 py-2"></td>
                        <td class="border border-green-900 px-4 py-2"></td>
                        <td class="border border-green-900 px-4 py-2"></td>
                        <td class="border border-green-900 px-4 py-2"></td>
                        <td class="border border-green-900 px-4 py-2"></td>
                        <td class="border border-green-900 px-4 py-2 justify-center flex flex-col">
                            <button class="bg-blue-600 rounded-xl p-3 px-5 text-white mb-3 px-5">Edit</button>
                            <button class="bg-red-600 rounded-xl p-3 px-3 text-white">Hapus</button>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>

    {{-- {{ $item->judul }} --}}

</body>

</html>
