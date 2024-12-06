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
                <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]"><a href="/">Logout</a></button>
            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <div class="flex justify-center items-center mb-10">
        <div class="w-5/6 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-10">Histori Pembelian Buku</h1>
            <div class="overflow-x-auto">
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Judul</th>
                            <th class="px-4 py-2 border">Harga</th>
                            <th class="px-4 py-2 border">Jumlah</th>
                            <th class="px-4 py-2 border">Subtotal</th>
                            <th class="px-4 py-2 border">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                        <tr>
                            <td class="px-4 py-2 border">
                                <ol class="list-decimal pl-5">
                                    @foreach ($detail_transaksis->where('id_transaksi', $transaksi->id) as $detail)
                                    @php
                                    $buku = $bukus->firstWhere('id', $detail->id_buku);
                                    @endphp
                                    <li>
                                        <span class="block font-semibold">{{ $buku->judul }}</span>
                                    </li>
                                    @endforeach
                                </ol>
                            </td>
                            <td class="px-4 py-2 border">
                                <ol class="pl-5">
                                    @foreach ($detail_transaksis->where('id_transaksi', $transaksi->id) as $detail)
                                    @php
                                    $buku = $bukus->firstWhere('id', $detail->id_buku);
                                    @endphp
                                    <li>Rp. {{ $buku->harga }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td class="px-4 py-2 border">
                                <ol class="pl-5">
                                    @foreach ($detail_transaksis->where('id_transaksi', $transaksi->id) as $detail)
                                    @php
                                    $buku = $bukus->firstWhere('id', $detail->id_buku);
                                    @endphp
                                    <li>x {{ $detail->qty }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td class="px-4 py-2 border">
                                <ol class="pl-5">
                                    @foreach ($detail_transaksis->where('id_transaksi', $transaksi->id) as $detail)
                                    @php
                                    $buku = $bukus->firstWhere('id', $detail->id_buku);
                                    $subtotal = $buku->harga * $detail->qty;
                                    @endphp
                                    <li>Rp. {{ $subtotal }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td class="px-4 py-2 border font-semibold">
                                Rp. {{ $transaksi->total }}
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