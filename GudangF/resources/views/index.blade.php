<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body class="bg-red-100">

    
    <div>
        <ul class="menu-bar">
            <h1>
                <a href="{{route('home')}}">
                    GUDANG
                </a>
            </h1>
            <li>
                <a href="/tambahbarang">Tambah Barang</a>
            </li>
            <li>
                <a href="/lihatbarang">Lihat Barang</a>
            </li>
            <li>
                <a href="/aturbarang">Atur Barang</a>
            </li>
           
           
        </ul>
    </div>
    <div class="flex justify-center font-serif text-5xl">
        <H2>MAU NGAPAIN HARI INI?</H2>
    </div>


    <div class="container mx-auto mt-10">
        @yield('content') 
    </div>

</body>
</html>
