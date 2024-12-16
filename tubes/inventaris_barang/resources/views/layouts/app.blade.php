<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventaris Barang Toko Bu Sudjarmiati</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>

<body>
    <div id="app">
        <div class="main-wrapper bg-white bg-gray-900 h-screen">
            @include('shared.header')
            <div class="main-content">
                @yield('content')
            </div>

        </div>
    </div>
</body>

</html>