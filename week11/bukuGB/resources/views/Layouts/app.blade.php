<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Laravel')</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Jika menggunakan CSS --}}
</head>

<body>
    {{-- Navbar --}}
    <nav class="bg-gray-800 text-white py-3">
        <div class="container mx-auto flex justify-around">
            <a href="{{ route('bukuses.index') }}" class="hover:text-gray-300">Daftar Buku</a>
            <a href="{{ route('Pembelian.index') }}" class="hover:text-gray-300">Beli</a>
            <a href="{{ route('Riwayat.index') }}" class="hover:text-gray-300">Riwayat Pembelian</a>
        </div>
    </nav>


    {{-- Konten Halaman --}}
    <div class="content">
        @yield('content')
    </div>


</body>

</html>