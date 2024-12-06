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
    <h1 class="text-center font-bold text-5xl mt-10">Keranjang Pembelian Buku</h1>
    <div class="flex justify-center items-center mb-10">
        <div class="w-5/6 p-6 shadow-lg bg-white rounded-md mt-10">
            <div class="">
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Foto</th>
                            <th class="px-4 py-2 border">Judul</th>
                            <th class="px-4 py-2 border">Harga</th>
                            <th class="px-4 py-2 border">Jumlah</th>
                            <th class="px-4 py-2 border">Subtotal</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keranjang as $index => $item)
                        <tr>
                            <td class="px-4 py-2 border">
                                <img src="{{ asset('storage/' . $item['foto']) }}" alt="foto" class="h-40 w-30 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border">{{ $item['judul'] }}</td>
                            <td class="px-4 py-2 border">Rp. {{ $item['harga'] }}</td>
                            <td class="px-4 py-2 border">{{ $item['qty'] }}</td>
                            <td class="px-4 py-2 border">Rp. {{ $item['harga']*$item['qty'] }}</td>
                            <td class="px-4 py-2 border">
                                <form action="/customer/hapuskeranjang/{{ $index }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 text-right">
                    <p class="font-bold text-xl">Total: Rp. {{ $total }}</p>
                </div>
                <div class="mt-4 text-right">
                    <a href="/customer/checkout" class="px-4 py-2 bg-black text-white rounded border border-black hover:bg-white hover:text-black">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>