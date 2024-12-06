<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>BOOKY</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen">
    <header class="bg-white">
        <!-- NAVBAR -->
        <nav class="flex justify-between items-center w-[92%] mx-auto">
            <div class="flex justify-between items-center">
                <img class="w-16" src="https://png.pngtree.com/template/20190316/ourmid/pngtree-books-logo-image_79143.jpg" alt="logo">
                <h1 class="font-black">BOOKY</h1>
            </div>
            <div class="">
                <ul class="flex items-center gap-10">
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/customer') }}">Home</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/customer/belibuku') }}">Beli Buku</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/customer/keranjang') }}">Keranjang</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/customer/histori') }}">Histori Pembelian</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]"><a href="/logout">Logout</a></button>
            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <h1 class="text-center font-bold text-5xl mt-10">Daftar Buku</h1>
    <div class="flex items-center justify-center container mx-auto mt-10 mb-10">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach ($bukus as $buku)
            <div class="card rounded-xl shadow-lg bg-white">
                <div class="p-5 flex flex-col">
                    <div class="rounded-md overflow-hidden h-96">
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $buku->foto) }}" alt="">
                    </div>
                    <h5 class="text-xl font-medium mt-3">{{ $buku->judul }}</h5>
                    <p class="text-slate-500 mt-1">{{ $buku->penulis }}</p>
                    <h5 class="text-xl font-medium mt-3">Rp. {{ $buku->harga }}</h5>
                    <a href="/customer/konfirmbeli/{{ $buku->id }}" class="mt-5 border border-[#fbc2eb] bg-[#fbc2eb] text-white text-center py-1 rounded-md w-full hover:bg-transparent hover:text-[#fbc2eb] font-medium">
                        Add to Cart
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>