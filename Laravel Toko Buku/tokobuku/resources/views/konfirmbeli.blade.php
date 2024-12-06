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
    <h1 class="text-center font-bold text-5xl mt-10">Konfirm Beli Buku</h1>
    <div class="flex items-center justify-center container mx-auto mt-10">
        <div class="card rounded-xl shadow-lg bg-white">
            <div class="p-5 flex flex-row gap-10">
                <div class="cols-6">
                    <div class="rounded-md overflow-hidden h-96">
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $buku->foto) }}" alt="">
                    </div>
                </div>
                <div class="cols-6">
                    <form action="/customer/keranjang" method="POST">
                        @csrf
                        <input type="hidden" name="foto" value="{{ $buku->foto }}">
                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                        <div class="mb-3 mt-3">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan judul buku..." value="{{ $buku->judul }}" readonly>
                        </div>
                        <div class="mb-5">
                            <label for="penulis">Penulis</label>
                            <input type="text" name="penulis" id="penulis" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan penulis buku..." value="{{ $buku->penulis }}" readonly>
                        </div>
                        <div class="mb-5">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan harga buku..." value="{{ $buku->harga }}" readonly>
                        </div>
                        <div class="mb-5">
                            <label for="qty">Jumlah buku yang dibeli</label>
                            <input type="number" name="qty" id="qty" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan jumlah buku..." require>
                        </div>
                        <div class="mb-5 flex gap-2">
                            <a href="/customer/belibuku" class="mt-5 border border-black bg-black text-white text-center py-1 rounded-md w-full hover:bg-transparent hover:text-black font-medium">Cancel</a>
                            <button type="submit" class="mt-5 border border-[#fbc2eb] bg-[#fbc2eb] text-white py-1 rounded-md w-full hover:bg-transparent hover:text-[#fbc2eb] font-medium">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>