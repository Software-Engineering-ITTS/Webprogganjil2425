<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body class="bg-gray-100">

    
    <div>
        <ul class="menu-bar">
            <h1 class="text-3xl">
                <a href="{{route('home')}}">
                    <span class="bu">BU</span>KU
                </a>
            </h1>
            <li>
                <a href="/tambahbuku">Tambah Buku</a>
            </li>
            <li>
                <a href="/lihatbuku">Lihat Buku</a>
            </li>
           
        </ul>
    </div>


    <div class="container mx-auto mt-10">
        @yield('content') 
    </div>

</body>
</html>
