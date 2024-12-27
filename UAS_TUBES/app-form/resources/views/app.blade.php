<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aset Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-600 min-h-screen">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">PT. SUGENG SIDOMUNDUR</h1>
            <div>
                <span>Welcome, <strong>admin</strong></span>
                <a href="/login" class="bg-red-500 text-white px-2 py-1 rounded-lg text-sm hover:bg-red-600">Logout</a>
            </div>
        </div>
    </header>

    <div class="container mx-auto py-6">
        <div class="flex">
            <nav class="w-1/4 bg-gray-400 shadow-md rounded-lg p-4">
                <ul>
                    <li class="mb-2">
                        <a href="/welcome" class="text-gray-700 font-medium hover:text-blue-600">Home</a>
                    </li>
                    <li class="mb-2">
                        <a href="/app" class="text-gray-700 font-medium hover:text-blue-600">Data Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/lihatlokasi" class="text-gray-700 font-medium hover:text-blue-600">Data Lokasi Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/pemeliharaan" class="text-gray-700 font-medium hover:text-blue-600">Pemeliharaan</a>
                    </li>
                    <li class="mb-2">
                        <a href="/viewpemeliharaan" class="text-gray-700 font-medium hover:text-blue-600">Data Pemeliharaan Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/lokasi" class="text-gray-700 font-medium hover:text-blue-600">Lokasi</a>
                    </li>
                </ul>
            </nav>
            <main class="w-3/4 ml-4">
                <div class="bg-gray-400 p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold text-gray-700 mb-4">Data Aset Perusahaan</h2>

                    <div class="flex justify-between mb-4">
                        <a href="/asettambah" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Tambah Data Aset Perusahaan</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">No</th>
                                    <th class="border border-gray-300 px-4 py-2">Kode Barang</th>
                                    <th class="border border-gray-300 px-4 py-2">Nama Aset</th>
                                    <th class="border border-gray-300 px-4 py-2">Spesifikasi Aset</th>
                                    <th class="border border-gray-300 px-4 py-2">Gambar Aset</th>
                                    <th class="border border-gray-300 px-4 py-2">Kategori Aset</th>
                                    <th class="border border-gray-300 px-4 py-2">Departement</th>
                                    <th class="border border-gray-300 px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $items)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $items->kode_barang }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $items->nama_aset }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $items->spesifikasi }}</td>
                                    <td class="border border-gray-300 px-4 py-2"><img width="100" src="img/{{ $items->gambar_aset }}"></td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $items->kategori_aset }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $items->departement }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="/aset/{{ $items->id }}/edit">
                                            <button class="bg-blue-500 text-white px-2 py-1 rounded-lg text-sm hover:bg-blue-600">Update</button>
                                        </a>
                                        <form method="POST" action="/aset/{{ $items->id }}">
                                        @method('delete')
                                        @csrf
                                            <a href="/aset/{{ $items->id }}/destroy">
                                                <button class="bg-red-500 text-white px-2 py-1 rounded-lg text-sm hover:bg-red-600">Delete</button>
                                            </a>
                                        </form>
                                    </td>
                                @endforeach 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
