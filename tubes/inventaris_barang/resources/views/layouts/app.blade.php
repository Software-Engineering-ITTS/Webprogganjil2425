<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventaris Barang Toko Bu Sudjarmiati</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <div id="app">
        @include('shared.header')
        <div class="flex h-screen overflow-hidden">
            @include('shared.sidebar')
            <div class="flex-1 overflow-y-auto overflow-auto transition-all duration-300 ease-in-out ">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</body>

</html>
