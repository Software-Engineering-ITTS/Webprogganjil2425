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
        <div class="main-wrapper dark:white dark:bg-gray-900 h-screen overflow-hidden">
            @include('shared.header')
            <div class="main-content overflow-hidden">
                @yield('content')
            </div>

        </div>
    </div>
</body>

</html>