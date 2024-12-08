<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <!-- Styles -->

<body>
    <div class="flex justify-center items-center mt-8 flex-col">
        <h1 class="text-6xl font-bold">
            Selamat datang ditoko buku kami
        </h1>
        <div class="mt-20">
            <a href="{{ route('barang.index')}}" class="border p-6 px-20 rounded-lg bg-green-600"><span class="font-bold-md text-xl text-white">Lihat Sekarang</span></a>
            
        </div>
    </div>
</body>
</head>

</html>
