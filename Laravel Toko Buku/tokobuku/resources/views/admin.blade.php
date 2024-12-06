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
    <div class=" h-5/6 flex justify-center items-center gap-5">
        <h1 class="text-center font-bold text-5xl">Selamat Datang Admin</h1>
        <h1 class="text-center font-bold text-7xl">📚</h1>
    </div>
</body>

</html>