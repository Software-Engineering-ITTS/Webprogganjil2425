<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>BOOKY</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee]">
    <header class="bg-white">
        <!-- NAVBAR -->
        <nav class="flex justify-between items-center w-[92%] mx-auto">
            <div class="flex justify-between items-center">
                <img class="w-16" src="https://png.pngtree.com/template/20190316/ourmid/pngtree-books-logo-image_79143.jpg" alt="logo">
                <h1 class="font-black">BOOKY</h1>
            </div>
            <div class="">
                <ul class="flex items-center gap-6">
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin') }}">Home</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin/daftarbuku') }}">Daftar Buku</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin/tambahbuku') }}">Tambah Buku</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin/historis') }}">Data Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]"><a href="/">Logout</a></button>
            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <div class="flex justify-center items-center mb-10">
        <div class="w-5/6 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-10">List Daftar Buku</h1>
            <div class="overflow-x-auto">
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Foto</th>
                            <th class="px-4 py-2 border">Judul</th>
                            <th class="px-4 py-2 border">Penulis</th>
                            <th class="px-4 py-2 border">Harga</th>
                            <th class="px-4 py-2 border">Stok</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukus as $buku)
                        <tr>
                            <td class="px-4 py-2 border">
                                <img src="{{ asset('storage/' . $buku->foto) }}" alt="foto" class="h-40 w-30 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border">{{ $buku->judul }}</td>
                            <td class="px-4 py-2 border">{{ $buku->penulis }}</td>
                            <td class="px-4 py-2 border">Rp. {{ $buku->harga }}</td>
                            <td class="px-4 py-2 border">{{ $buku->stok }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex gap-2">
                                    <a href="/admin/editbuku/{{ $buku->id }}" class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500">
                                        Edit
                                    </a>
                                    <form action="/admin/hapusbuku/{{ $buku->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="px-3 py-1 bg-red-400 text-white rounded hover:bg-red-500" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>