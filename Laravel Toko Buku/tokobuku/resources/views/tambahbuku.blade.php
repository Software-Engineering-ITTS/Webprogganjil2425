<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>BOOKY</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen">
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
    <!-- <h1 class="text-center font-bold text-5xl mt-6">Tambah Buku</h1> -->
    <div class="flex justify-center items-center">
        <div class="w-2/3 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-5">Form Tambah Buku</h1>
            <form action="/admin/tambahbuku" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan judul buku..." require>
                </div>
                <div class="mb-5">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan penulis buku..." require>
                </div>
                <div class="mb-5">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan harga buku..." require>
                </div>
                <div class="mb-5">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan stok buku..." require>
                </div>
                <div class="mb-5">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="border rounded-md w-full text-base px-2 py-1" require>
                </div>
                <button type="submit" class="border border-[#fbc2eb] bg-[#fbc2eb] text-white py-1 rounded-md w-full hover:bg-transparent hover:text-[#fbc2eb] font-medium">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>